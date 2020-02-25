<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('/test')->group(function (){
   Route::get('/wx/token','TextController@getAccessToken');
   Route::get('/wx/curl','TextController@curl');
   Route::get('/wx/guzzle','TextController@guzzle');
   Route::get('/get1','TextController@get1');
   Route::get('/goods ','GoodsController@goods');
   Route::get('/count ','TextController@count');
   Route::get('/md5test ','TextController@md5test');
   Route::get('/lucky ','TextController@lucky');
   Route::get('/encrypt ','TextController@encrypt');
   Route::get('/decrypt ','TextController@decrypt');
   Route::get('/encrypt1 ','TextController@encrypt1');
   Route::get('/rsa1 ','TextController@rsa1');

   //
});


Route::get('/alipay ','AlipayController@alipay');



