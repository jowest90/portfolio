<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    // your routes
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
    Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
    Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);

    Route::get('/management', function(){
            return view('management.index');
        });
        //routes for management
        Route::resource('products', [App\Http\Controllers\Management\CategoryController::class]);
        // Route::get('/management/category',[App\Http\Controllers\Management\CategoryController::class, 'index']);
        // Route::get('/management/category/create',[App\Http\Controllers\Management\CategoryController::class, 'create']);
        // Route::post('/management/category',[App\Http\Controllers\Management\CategoryController::class, 'store']);
        // Route::get('/management/category/{{$category->id}}/edit',[App\Http\Controllers\Management\CategoryController::class, 'edit']);
        // Route::post('/management/category/{{$category->id}}',[App\Http\Controllers\Management\CategoryController::class, 'update']);
        // Route::post('/management/category/{{$category->id}}',[App\Http\Controllers\Management\CategoryController::class, 'destroy']);
        Route::get('/management/menu',[App\Http\Controllers\Management\MenuController::class, 'index']);
        Route::get('/management/table',[App\Http\Controllers\Management\tableController::class, 'index']);
        Route::get('/management/user',[App\Http\Controllers\Management\UserController::class, 'index']);
        //routes for report

        Route::get('/report', 'Report\ReportController@index');
        Route::get('/report/show', 'Report\ReportController@show');

        // Export to excel
        Route::get('/report/show/export', 'Report\ReportController@export');
});
