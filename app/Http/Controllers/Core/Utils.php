<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Missatges\Missatges;
use Illuminate\Support\Facades\Route;

class Utils {

	public static function redirect( $rute, $msg = '', $type = 'success' ) {
		$locale = Route::current()->parameter('locale');
		if ( !empty($msg) ){
			$_SESSION['alert'] = [ "msg"  => $msg, "type" => $type ];
		}
		self::goto($locale . $rute);
	}

	public static function alert( $rute, $msg , $type = 'success'){
		$locale = Route::current()->parameter('locale');
		$_SESSION['alert'] = [ "trad" => $msg , "type" => $type ];
		self::goto($locale . $rute);
	}

	public static function goto( $rute ){
		$https= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http"   );
		die(header(
				'Location: ' . $https . '://' . $_SERVER['HTTP_HOST'] . '/' . $rute
		));
	}

	public static function upload( $target, $dir = "/img/elements/", $types = ['jpg','png','jpeg'] ){
		$ok = 1;

		if (is_array($_FILES[ $target ]['name'])) {
			$images = [];

			foreach ($_FILES[ $target ]['name'] as $k => $name) {

				$_FILES["file-{$k}"] = [
					'name'     => $name,
					'type'     => $_FILES[ $target ]['type'][$k],
					'tmp_name' => $_FILES[ $target ]['tmp_name'][$k],
					'error'    => $_FILES[ $target ]['error'][$k],
					'size'     => $_FILES[ $target ]['size'][$k],
				];

				$images[] = self::upload("file-{$k}",$dir,$types);
			}

			return $images;
		}

		$name = str_replace(' ', '_', strtolower( strval(time()) . '_' . basename($_FILES[ $target ]["name"])));
		$store= public_path() . $dir . $name;
		$dirn = dirname($store);

		if (!is_dir($dirn)) {
			mkdir($dirn, 0755 , true );
		}

		if ($_FILES[ $target ]["size"] > 5000000) {
			return null;
		}

		if(!in_array(strtolower(pathinfo( $store ,PATHINFO_EXTENSION)) ,$types)) {
			return null;
		}

    if (move_uploaded_file($_FILES[ $target ]["tmp_name"], $store )) {
        return $name;
    }

		return null;
	}

}
