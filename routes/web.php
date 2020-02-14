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
   //
});




