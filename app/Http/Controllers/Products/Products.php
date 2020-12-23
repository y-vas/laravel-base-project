<?php
namespace App\Http\Controllers\Products;

use VSQL\VSQL\VSQL;

class Products {
// ~~~~ get ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function sel( $arr, $all = false ){
		$v = new VSQL();

    $v->query("SELECT {
    { count(*) as `num` count; }
			default: *
    } FROM Products WHERE TRUE
		{ AND `productName`       =  s:productName       }
		{ AND `productTypeName`   =  s:productTypeName   }
		{ AND `numeracioTerminal` =  i:numeracioTerminal }
		{ AND `customerId`        =  i:customerId        }
		{ AND `soldAt`            =  i:soldAt            }
		{ AND `id` != i:nid             }
		{ AND `id` = i:id               }
		{ ORDER BY  :order              }
		{ LIMIT i:limit { OFFSET i:offset } }
		", $arr, false
		// ,true
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
		$v->query("INSERT INTO Products VALUES (
		 i:id       ? 0; ,
		 s:productName       ? 0; ,
		 s:productTypeName   ? ''; ,
		 i:numeracioTerminal ? 0; ,
		 i:customerId        ? 0; ,
		 NOW() )"
		, $arr, false
		// , true
		);


		return $v->run()->insert_id;
	}


// ~~~~ del ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function del( $arr ){
		$v = new VSQL();

    $v->query("DELETE FROM Products WHERE
      { id = +i:id }
      ", $arr, false
    );

		return $v->run();
	}


// ~~~~ upd ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function upd( $arr ){
		$v = new VSQL();
		$v->query("UPDATE Products SET
		{ id                = i:id                ,}
		{ productName       = s:productName       ,}
		{ productTypeName   = s:productTypeName   ,}
		{ numeracioTerminal = i:numeracioTerminal ,}
		{ customerId        = i:customerId        ,}
		{ soldAt            = i:soldAt            ,}
		 id = id
    { STATUS = !STATUS  toggle; }
    WHERE
		 id = i:id
		", $arr, false
		);

		return $v->run();
	}


// ~~~~ rep ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function rep( $arr ){
		$id = !empty($arr['id']) ? $arr['id'] : null;
		if ($id != null){
      self::upd($arr);
    }else{
      $id = self::add( $arr );
    }

    return $id;
  }



// ~~~~ sort ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function sort( $id, $put ){
		$elem = self::sel(['id' => $id ]);
		$pos = $elem->ORDER_COLUMN;
    $zon = $elem->zone;

    if ($id == null) return;
    $sorts = self::sel([
      '_id'   => true,
			'zone'  => $zon,
			'order' => 'ORDER_COLUMN',
			'nid' => $id
		], true );

    foreach ($sorts as $k => $v) {
      if ($k >= $put) $k++;
			self::upd(['id'=>$v->id,'ORDER_COLUMN'=>$k]);
		}

    self::upd(['id'=> $id,'ORDER_COLUMN'=> $put ]);
  }


// ~~~~ clone ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public static function clone( $arr ){
		$obj = self::sel([ 'id' => $arr['id'] ]);

		$id = self::add([
			'id'                => $obj->id                 ,
			'productName'       => $obj->productName        ,
			'productTypeName'   => $obj->productTypeName    ,
			'numeracioTerminal' => $obj->numeracioTerminal  ,
			'customerId'        => $obj->customerId         ,
			'soldAt'            => $obj->soldAt             ,
		]);

		$obj->id = $id;

		return $obj;
	}
}
