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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
//------------------------USER PAGES--------------------------------------------
Route::prefix('/')->group(function(){
    //User home page
    Route::get('/', 'HomeController@index');

    // //Profile settings
    // Route::get('/profile/edit/{id}', "HomeController@edit");
    // Route::post('/profile/update', "HomeController@update");

    //Chat settings
    Route::post('/chat','ChatController@sendMessage');
    Route::get('/chat','ChatController@chatPage');
  });
