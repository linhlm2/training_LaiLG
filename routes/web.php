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
Route::group(['prefix'=>'admin'],function(){

	Route::group(['prefix'=>'staff'],function(){

		Route::get('list','StaffController@getList');

		// Route::get('sua/{id}','NhanVienController@getSua');
		// Route::post('sua/{id}','NhanVienController@postSua');

		// Route::get('them','NhanVienController@getThem');
		// Route::post('them','NhanVienController@postThem');

		// Route::get('xoa/{id}','NhanVienController@postXoa');
	});

});
