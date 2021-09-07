<?php

use App\Http\Controllers\admin\AdminsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('login','AdminsController@loginForm');
Route::post('admin_login','AdminsController@checkLogin')->name('admin_login');

Route::middleware('auth:admin')->group(function () {

    /** --------------------- admin  ----------------------- **/
    Route::get('admin-dashboard','AdminsController@dashboard');
    Route::get('profile','AdminsController@profile');
    Route::post('update_profile','AdminsController@update_profile');

    /** --------------------- manage teachers   ----------------------- **/
    Route::resource('teachers','TeachersController');

    /** --------------------- manage courses   ----------------------- **/
    Route::resource('admin-courses','CoursesController');


    /** --------------------- manage courses   ----------------------- **/
    Route::resource('admin-students','StudentsController');
});
