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
    return view('homeController@index');
});

Route::get('/login' ,'InfoController@index')->name('loginStart');                                                     //登入首頁
Route::post('/login',['as'=>'login','uses'=>'AuthController@login']);                         //登入認證

Route::group(['prefix' => '/info'], function () {
    Route::get('/','InfoController@showInfo')->name('loginSuccess');                                //登入後
    Route::post('/import','InfoController@import')->name('excelFileGet');
});

Route::get('/logout','InfoController@Logout');                                                    //登出
Route::get('/registered',['as'=>'registered','uses'=>'homeController@registered']);               //註冊

//Route::get('/{teacher_info?}',['as'=>'loginSuccess','uses'=>'homeController@showInfo']);          //老師登入成功
//Route::get('/import/{id?}',['as'=>'importEx','uses'=>'homeController@import']);   //匯入

Route::group(['middleware'=>'table'],function(){
    Route::get('/',"TableController@index");                                                     //訪談表單
    Route::get('/{list_id}',"TableController@EditList");                                        //修改表單
});
