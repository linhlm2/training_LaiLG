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
    return view('welcome')->name('home');
});

Route::get('admin/login','LoginController@getLoginAdmin');
Route::post('admin/login','LoginController@postLoginAdmin');
Route::get('admin/logout','LoginController@getLogoutAdmin');

Route::get('staff/login','LoginController@getLoginStaff')->name('staffLogin');
Route::post('staff/login','LoginController@postLoginStaff');
Route::get('staff/logout','LoginController@getLogoutStaff');

//Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    
	Route::group(['prefix'=>'staff'],function(){

		Route::get('list','StaffController@getList');

		 Route::get('edit/{id}','StaffController@getEdit');
		 Route::post('edit/{id}','StaffController@postEdit');

		 Route::get('add','StaffController@getAdd');
		 Route::post('add','StaffController@postAdd');

		 Route::get('delete/{id}','StaffController@getDelete');
	});
        Route::group(['prefix'=>'position'],function(){

		Route::get('list','PositionController@getList');

		 Route::get('edit/{id}','PositionController@getEdit');
		 Route::post('edit/{id}','PositionController@postEdit');

		 Route::get('add','PositionController@getAdd');
		 Route::post('add','PositionController@postAdd');

		 Route::get('delete/{id}','PositionController@getDelete');
	});
        Route::group(['prefix'=>'department'],function(){

		Route::get('list','DepartmentController@getList');

		 Route::get('edit/{id}','DepartmentController@getEdit');
		 Route::post('edit/{id}','DepartmentController@postEdit');

		 Route::get('add','DepartmentController@getAdd');
		 Route::post('add','DepartmentController@postAdd');

		 Route::get('delete/{id}','DepartmentController@getDelete');
	});

});

Route::group(['prefix'=>'staff','middleware'=>'staffLogin'],function(){
    Route::get('view/{id}','StaffController@getView');
    Route::get('edit/{id}','StaffController@getStaffEdit');
    Route::post('edit/{id}','StaffController@postStaffEdit');
});
Route::get('changepassword/{id}','LoginController@getChangePassword');
Route::post('changepassword/{id}','LoginController@postChangePassword');

Auth::routes();

Route::post('/resetmulti', 'ResetPasswordController@sendMail');