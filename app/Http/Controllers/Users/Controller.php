<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\Users;

class Controller extends \App\Http\Controllers\Core\Administracio {
// ~~~~ index ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function index(){
		$limit = 10;
		$page = (($_GET['page'] ?? 1) - 1) * $limit;

		$search = [
 			'customerId'  => $_GET['customerId']   ?? null ,
			'docType'     => $_GET['docType']      ?? null ,
			'docNum'      => $_GET['docNum']       ?? null ,
			'email'       => $_GET['email']        ?? null ,
			'givenName'   => $_GET['givenName']    ?? null ,
			'familyName1' => $_GET['familyName1']  ?? null ,
			'phone'       => $_GET['phone']        ?? null ,
 			'limit'  => $limit,
			'offset' => $page
		];

		return view('Users/index',[
      'objs'=> Users::sel($search, true ),
      'max' => ceil( Users::count( $search ) / $limit )
    ]);
	}

// ~~~~ show ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function show(){
		$obj = Users::sel(['customerId'=>request()->route('id')]);

		if ( !isset( $obj->customerId ) ){
      // Utils::alert( '/rute' , 'Item-Not-Found' , 'danger');
    }

		return view('Users/show',[
      'obj' => $obj
		]);
	}

// ~~~~ static ~ compose ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	private static function compose( $arr ){

		$what = [
 			'customerId'  => $arr['customerId']   ?? null ,
			'docType'     => $arr['docType']      ?? null ,
			'docNum'      => $arr['docNum']       ?? null ,
			'email'       => $arr['email']        ?? null ,
			'givenName'   => $arr['givenName']    ?? null ,
			'familyName1' => $arr['familyName1']  ?? null ,
			'phone'       => $arr['phone']        ?? null ,
 		];

		return Users::rep($what);
	}

// ~~~~ edit ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function edit( ){
    $id = self::compose($_POST);
    return redirect('/');
  }

// ~~~~ ajax ~ edit ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function ajaxedit( ){
    $id = self::compose($_POST);

    die(json_encode([
			'success' => true,
      'id' => $id
		]));
  }


// ~~~~ sort ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function sort(){
		$id = request()->route('id');
    if (!isset($_GET['pos'])){
      die(json_encode([  'success'=> false ]));
    }

    Users::sort( $id , $_GET['pos'] );
    die(json_encode([
			'success' => true,
		]));
	}


}
