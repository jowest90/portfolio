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
    Route::get('/home', 'HomeController@home');
    Route::get('/movie', 'HomeController@movie');

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
  Route::get('/cashier', 'Cashier\CashierController@index');
  Route::get('/cashier/getMenuByCategory/{category_id}', 'Cashier\CashierController@getMenuByCategory');
  Route::get('/cashier/getTable', 'Cashier\CashierController@getTables');
  Route::get('/cashier/getSaleDetailsByTable/{table_id}', 'Cashier\CashierController@getSaleDetailsByTable');

  Route::post('/cashier/orderFood', 'Cashier\CashierController@orderFood');
  Route::post('/cashier/deleteSaleDetail', 'Cashier\CashierController@deleteSaleDetail');

  Route::post('/cashier/confirmOrderStatus', 'Cashier\CashierController@confirmOrderStatus');
  Route::post('/cashier/savePayment', 'Cashier\CashierController@savePayment');
  Route::get('/cashier/showReceipt/{saleID}', 'Cashier\CashierController@showReceipt');

  Route::get('/management', function(){
      return view('management.index');
  });
  //routes for management
  Route::resource('management/category','Management\CategoryController');
  Route::resource('management/menu','Management\MenuController');
  Route::resource('management/table','Management\TableController');
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
