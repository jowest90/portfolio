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
        Route::resource('management/category',App\Http\Controllers\Management\CategoryController::class);
        Route::resource('management/menu',App\Http\Controllers\Management\MenuController::class);
        Route::resource('management/table',App\Http\Controllers\Management\TableController::class);
        Route::resource('management/user',App\Http\Controllers\Management\UserController::class);
        // routes for cashier
        Route::get('/cashier', [App\Http\Controllers\Cashier\CashierController::class, 'index']);
        Route::get('/cashier/getMenuByCategory/{category_id}',[App\Http\Controllers\Cashier\CashierController::class, 'getMenuByCategory']);
        Route::get('/cashier/getTable',[App\Http\Controllers\Cashier\CashierController::class, 'getTables']);
        Route::get('/cashier/getSaleDetailsByTable/{table_id}',[App\Http\Controllers\Cashier\CashierController::class, 'getSaleDetailsByTable']);

        Route::post('/cashier/orderFood',[App\Http\Controllers\Cashier\CashierController::class, 'orderFood']);
        Route::post('/cashier/deleteSaleDetail',[App\Http\Controllers\Cashier\CashierController::class, 'deleteSaleDetail']);

        Route::post('/cashier/confirmOrderStatus', [App\Http\Controllers\Cashier\CashierController::class, 'confirmOrderStatus']);
        Route::post('/cashier/savePayment',[App\Http\Controllers\Cashier\CashierController::class, 'savePayment']);
        Route::get('/cashier/showReceipt/{saleID}',[App\Http\Controllers\Cashier\CashierController::class, 'showReceipt']);
        //routes for report
        Route::get('/report',[App\Http\Controllers\Report\ReportController::class, 'index']);
        Route::get('/report/show',[App\Http\Controllers\Report\ReportController::class, 'show']);
        // Export to excel
        Route::get('/report/show/export',[App\Exports\SaleReportExport::class, 'export']);
});
