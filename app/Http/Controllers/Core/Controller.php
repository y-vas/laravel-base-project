<?php

namespace App\Http\Controllers\Core;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Core\Utils;
use \VSQL\VSQL\VSQL;


class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct( ){
      session_start();


    }

}
