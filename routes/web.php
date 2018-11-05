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

/*Route::get('/', function () {
    $data = DB::select("show tables");
    var_dump($data);
    return view('welcome');
});*/
Route::get('/', 'TodoController@index');
Route::post('/', 'TodoController@create');
Route::post('/{todo}/setCompleted', 'TodoController@setCompleted');
Route::post('/deleteCompleted', 'TodoController@deleteCompleted');