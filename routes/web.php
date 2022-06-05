<?php
use App\Events\MessagePosted;
// use App\Student;

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
//------------------------MESSAGES--------------------------------------------
Route::get('/messages', function () {
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function () {
  // Store the new message
    $user = Auth::user();
    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);
    // Announce that a new message has been posted
    broadcast(new MessagePosted($message, $user))->toOthers();
    return ['status' => 'OK'];
})->middleware('auth');
//------------------------USER PAGES--------------------------------------------

Route::prefix('/')->group(function(){
    //User home page
    Route::get('/', 'HomeController@index');
    Route::get('/chat','HomeController@chat');

    // //Profile settings
    // Route::get('/profile/edit/{id}', "HomeController@edit");
    // Route::post('/profile/update', "HomeController@update");

    //Chat settings
    Route::post('/chat','ChatController@sendMessage');
    Route::get('/chat','ChatController@chatPage');
  });

  /*
  Movie Application
  DESC: An application that creates movie tickets to customers.
  ------------------------------------------------------------------------------
  */
  Route::get('/movie', function(){
        return view('movie.index');
    });

    Route::get('/management', function(){
        return view('movie.management.index');
    });

    //routes for management
    Route::resource('movie/management/category','Management\CategoryController');
    Route::resource('movie/management/menu','Management\MenuController');
    Route::resource('movie/management/table','Management\tableController');
    Route::resource('movie/management/user','Management\UserController');

  // Route::get('/', function () {
  //     $users = Student::all();
  //     return view('data', ['users'=> $users]);
  // });
