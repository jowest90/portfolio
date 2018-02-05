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
Auth::routes();
Route::prefix('/')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
  });

  Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //ADMIN LOGIN
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    //ADMIN USER REGISTRATION
    Route::get('/createUser', 'AdminController@createUser')->name('admin.createUser');
    Route::post('/createUser', 'AdminController@addUser')->name('admin.createUser.submit');
    //ADMIN REGISTRATION
    Route::get('/createAdmin', 'AdminController@createAdmin')->name('admin.createAdmin');
    Route::post('/createAdmin', 'AdminController@addAdmin')->name('admin.createAdmin.submit');

    Route::get('/userScore', 'AdminController@userScore')->name('admin.userScore');

    //ADMIN RESET PASSWORD
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  });
