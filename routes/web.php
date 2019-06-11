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

Route::get('/login' ,'InfoController@index')->name('loginStart');                                     //登入首頁
Route::post('/login',['as'=>'login','uses'=>'AuthController@login']);                                 //登入認證
Route::get('/logout','InfoController@Logout');                                                        //登出
Route::post('/registered',['as'=>'registered','uses'=>'InfoController@registered']);                  //註冊

Route::group(['prefix' => '/info'], function () {
    Route::get('/','InfoController@showInfo')->name('loginSuccess');                                //登入後
    Route::post('/update','InfoController@updateShow')->name('showChang');                          //刷新
    Route::post('/import','InfoController@import')->name('excelFileGet');                           //excel匯入
});



Route::group(['prefix'=>'table'],function(){
    Route::get('/{student}',"TableController@createList")->name('tableCreate');                                             //訪談表單
    Route::post('/new',"TableController@create")->name('tableCreating');                                                    //新增表單\
    Route::post('new/file','TableController@createfile')->name('tableFileCreate');
    Route::post('/search/{list_id}',"TableController@EditList")->name('tableEdit');                                         //修改表單
    Route::post('/del/{list_id}',"TableController@DelList")->name('tableDel');                                              //刪除表單
});

Route::group(['prefix'=>'tone'],function (){
    Route::get('/','ToneController@index')->name('tonomer');
    Route::get('/info/get','ToneController@getInfo')->name('runinfo');
});
