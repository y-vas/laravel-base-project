<?php
namespace App\Http\Controllers\Users;

use VSQL\VSQL\VSQL;

class Users {
// ~~~~ get ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function sel( $arr, $all = false ){
		$v = new VSQL();

    $v->query("SELECT {
    { count(*) as `num` count; }
    { `customerId`  _id; }
      default: *
    } FROM Users WHERE TRUE
		{ AND `customerId`  =  i:customerId  }
		{ AND `docType`     =  s:docType     }
		{ AND `docNum`      =  s:docNum      }
		{ AND `email`       =  s:email       }
		{ AND `givenName`   =  s:givenName   }
		{ AND `familyName1` =  s:familyName1 }
		{ AND `phone`       =  s:phone       }
		{ AND `customerId` != i:ncustomerId               }
		{ ORDER BY      :order              }
		{ LIMIT i:limit { OFFSET i:offset } }
		", $arr, false
		);

		return $v->get($all);
	}


// ~~~~ count ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function count( $arr ){
		$obj = self::sel(
      array_merge($arr , ['count' => true ])
    );

		return $obj->num;
	}


// ~~~~ add ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function add( $arr ){
		$v = new VSQL();
		$v->query("INSERT INTO Users VALUES (
		 i:customerId  ? 0; ,
		 s:docType     ? ''; ,
		 s:docNum      ? ''; ,
		 s:email       ? ''; ,
		 s:givenName   ? ''; ,
		 s:familyName1 ? ''; ,
		 s:phone       ? ''; )"
		, $arr, false
		);


		return $v->run()->insert_id;
	}


// ~~~~ del ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function del( $arr ){
		$v = new VSQL();

    $v->query("DELETE FROM Users WHERE
      { customerId = +i:customerId }
      ", $arr, false
    );

		return $v->run();
	}


// ~~~~ upd ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function upd( $arr ){
		$v = new VSQL();
		$v->query("UPDATE Users SET
		{ customerId  = i:customerId  ,}
		{ docType     = s:docType     ,}
		{ docNum      = s:docNum      ,}
		{ email       = s:email       ,}
		{ givenName   = s:givenName   ,}
		{ familyName1 = s:familyName1 ,}
		{ phone       = s:phone       ,}
		 customerId = customerId
    { STATUS = !STATUS  toggle; }
    WHERE
		 customerId = i:customerId
		", $arr, false
		);

		return $v->run();
	}


// ~~~~ rep ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function rep( $arr ){
		$id = !empty($arr['customerId']) ? $arr['customerId'] : null;
		if ($id != null){
      self::upd($arr);
    }else{
      $id = self::add( $arr );
    }

    return $id;
  }



// ~~~~ sort ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function sort( $id, $put ){
		$elem = self::sel(['customerId' => $id ]);
		$pos = $elem->ORDER_COLUMN;
    $zon = $elem->zone;

    if ($id == null) return;
    $sorts = self::sel([
      '_id'   => true,
			'zone'  => $zon,
			'order' => 'ORDER_COLUMN',
			'ncustomerId' => $id
		], true );

    foreach ($sorts as $k => $v) {
      if ($k >= $put) $k++;
			self::upd(['customerId'=>$v->customerId,'ORDER_COLUMN'=>$k]);
		}

    self::upd(['customerId'=> $id,'ORDER_COLUMN'=> $put ]);
  }


// ~~~~ clone ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function clone( $arr ){
		$obj = self::sel([ 'customerId' => $arr['customerId'] ]);

		$id = self::add([
			'customerId'  => $obj->customerId   ,
			'docType'     => $obj->docType      ,
			'docNum'      => $obj->docNum       ,
			'email'       => $obj->email        ,
			'givenName'   => $obj->givenName    ,
			'familyName1' => $obj->familyName1  ,
			'phone'       => $obj->phone        ,
		]);

		$obj->customerId = $id;

		return $obj;
	}
}
