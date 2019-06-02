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

//Route::get('/', function () {
//    return view('homeController@index');
//});
//Route::group(['middleware'=>'auth'],function ())
Route::get('/login' ,'homeController@index');
Route::post('/login',['as'=>'login','uses'=>'homeController@postLogin']);
Route::get('/logout','homeController@Logout');

Route::get('/{teacher_info?}',['as'=>'loginSuccess','uses'=>'homeController@showInfo']);
Route::get('/registered',['as'=>'registered','uses'=>'homeController@registered']);
