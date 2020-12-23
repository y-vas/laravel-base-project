<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/' ,'Users\Controller@index');
Route::post( '/edit/{id}' ,'Users\Controller@edit');
Route::get(  '/show/{id}' ,'Users\Controller@show');

Route::get( '/products'           ,'Products\Controller@index' );
Route::post('/products/edit/{id}' , 'Products\Controller@edit' );
Route::get( '/products/show/{id}' , 'Products\Controller@show' );

// Route::get( '/' ,'Users\Controller@index');
