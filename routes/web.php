<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\stockController;
use App\Http\Controllers\RequestController;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', [Controller::class, 'welcome']);


Route::group(['middleware' => ['auth', 'admin']], function () {



    //OTHERS
    Route::get('/admin_home', [Controller::class, 'adminHomeIndex'])->middleware('auth');



    //MANAGE STOCK---------------------------------------------------------------------------
    Route::get('/stock', [Controller::class, 'stockIndex']);
    Route::post('/stock', [Controller::class, 'stockStore']);
    Route::delete('/stock/{item_id}', [Controller::class, 'stockDestroy']);

    Route::post('/stock/show', [Controller::class, 'stockUpdate']);
    Route::get('/stock/show/{item_id}', [Controller::class, 'stockShow']);

    Route::get('/stock/create', [Controller::class, 'stockCreate']);

    Route::get('/stock/report', [Controller::class, 'stockReport']);



    // ITEM APPROVAL ---------------------------------------------------------------------------
    Route::get('/item_approvals/userList', 'App\Http\Controllers\Controller@approveIndex');
    Route::get('/item_approvals/request/{id}', 'App\Http\Controllers\Controller@approveShow');
    Route::get('/item_approvals/req/{reqid}/{id}', 'App\Http\Controllers\Controller@approveDelete');
    Route::post('/item_approvals/userList/{id}', 'App\Http\Controllers\Controller@approveItem');



    // MANAGE NEW STOCK ORDERS
    Route::get('/mngNewStck', 'App\Http\Controllers\Controller@mngStockIndex');
    Route::get('/mngNewStck/itemList', 'App\Http\Controllers\Controller@mngStockitemList');
    Route::get('/mngNewStck/orderCart', 'App\Http\Controllers\Controller@mngStockorderCart');
    Route::get('/mngNewStck/orderRec/{id}/update', 'App\Http\Controllers\Controller@mngStockupdateOrder');
    Route::get('/mngNewStck/orderRec', 'App\Http\Controllers\Controller@mngStockorderRec');
    Route::get('/mngNewStck/orderRec/{id}', 'App\Http\Controllers\Controller@mngStockorderDet');
    Route::get('/mngNewStck/delCartItem/{id}', 'App\Http\Controllers\Controller@mngStockdelCartItem');
    Route::post('/mngNewStck/orderCart', 'App\Http\Controllers\Controller@mngStockupdateCart');
    Route::post('/mngNewStck/orderRec', 'App\Http\Controllers\Controller@mngStockstoreOrder');
    Route::post('/mngNewStck/orderRec/{id}', 'App\Http\Controllers\Controller@mngStockstoreOrderUpdate');


    //Audit Report
    Route::get('/auditreport', 'App\Http\Controllers\Controller@auditIndex');
    Route::get('/auditreport/view/{id}', 'App\Http\Controllers\Controller@auditShow');
});


Route::get('/staff_home', [Controller::class, 'staffHomeIndex'])->middleware('auth');



//LOGIN USER ACCESSIBLE ---------------------------------------------------------------------------------------------------
Route::get('/request', [Controller::class, 'requestCreate'])->middleware('auth');
Route::get('/request/list', [Controller::class, 'requestList'])->middleware('auth');
Route::get('/request/list/{id}', [Controller::class, 'requestShow'])->middleware('auth');
Route::post('/request/list/update/{id}', [Controller::class, 'requestUpdate'])->middleware('auth');
Route::get('/request/list/delete/{id}/{req_id}', [Controller::class, 'requestDelete'])->middleware('auth');
Route::post('/request/submit', [Controller::class, 'requestStore'])->middleware('auth');






Auth::routes();

//PUBLIC ---------------------------------------------------------------------------------------------------
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to("/login");
});