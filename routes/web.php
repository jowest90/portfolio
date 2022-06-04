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

    // //Profile settings
    // Route::get('/profile/edit/{id}', "HomeController@edit");
    // Route::post('/profile/update', "HomeController@update");

    //Chat settings
    Route::post('/chat','ChatController@sendMessage');
    Route::get('/chat','ChatController@chatPage');
  });
/*
--------------------------------------------------------------------------------
*/


/*
--------------------------------------------------------------------------------
*/

  /*
  Movie Appl;ication
  */
  // routes for cashier

Route::middleware(['auth', 'VerifyAdmin'])->group(function(){
    Route::get('/management', function(){
        return view('management.index');
    });
    //routes for management
    Route::resource('management/category','Management\CategoryController');
    Route::resource('management/menu','Management\MenuController');
    Route::resource('management/table','Management\tableController');
    Route::resource('management/user','Management\UserController');
    //routes for report

    Route::get('/report', 'Report\ReportController@index');
    Route::get('/report/show', 'Report\ReportController@show');

    // Export to excel
    Route::get('/report/show/export', 'Report\ReportController@export');
/*
--------------------------------------------------------------------------------
*/

  // Route::get('/', function () {
  //     $users = Student::all();
  //     return view('data', ['users'=> $users]);
  // });
