<?php
namespace App\Http\Controllers\Products;

use App\Http\Controllers\Products\Products;
use App\Http\Controllers\Users\Users;

class Controller extends \App\Http\Controllers\Core\Administracio {
// ~~~~ index ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function index(){
		$limit = 10;
		$page = (($_GET['page'] ?? 1) - 1) * $limit;

		$search = [
 			'id'                => $_GET['id']                 ?? null ,
			'productName'       => $_GET['productName']        ?? null ,
			'productTypeName'   => $_GET['productTypeName']    ?? null ,
			'numeracioTerminal' => $_GET['numeracioTerminal']  ?? null ,
			'customerId'        => $_GET['customerId']         ?? null ,
			'soldAt'            => $_GET['soldAt']             ?? null ,
 			'limit'  => $limit,
			'offset' => $page
		];

		return view('Products/index',[
      'objs' => Products::sel($search, true ),
			'users'=> Users::sel([], true ),
      'max'  => ceil( Products::count( $search ) / $limit )
    ]);
	}

// ~~~~ show ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function show(){
		$obj = Products::sel(['id'=>request()->route('id') ]);

		if ( !isset( $obj->id ) ){
      // Utils::alert( '/rute' , 'Item-Not-Found' , 'danger');
    }

		return view('Products/show',[
      'obj' => $obj,
			'users'=> Users::sel([], true ),
		]);
	}

// ~~~~ static ~ compose ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	private static function compose( $arr ){

		$what = [
 			'id'                => $arr['id']                 ?? null ,
			'productName'       => $arr['productName']        ?? null ,
			'productTypeName'   => $arr['productTypeName']    ?? null ,
			'numeracioTerminal' => $arr['numeracioTerminal']  ?? null ,
			'customerId'        => $arr['customerId']         ?? null ,
			'soldAt'            => $arr['soldAt']             ?? null ,
 		];

		return Products::rep($what);
	}

// ~~~~ edit ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	public function edit( ){
    $id = self::compose( $_POST );
		return redirect('/products');
  }

}
