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

Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');

//custom login and register routes
Route::get('/create-account', [App\Http\Controllers\PagesController::class, 'createAccount'])->name('createAccount');
Route::post('/create-account', [App\Http\Controllers\AccountController::class, 'submitAccount'])->name('submitAccount');

Route::get('/login-account', [App\Http\Controllers\PagesController::class, 'loginPage'])->name('loginPage');
Route::post('/login-account', [App\Http\Controllers\AccountController::class, 'submitLogin'])->name('submitLogin');
//end custom login and register routes

Route::get('/join-riders', [App\Http\Controllers\PagesController::class, 'becomeRider'])->name('becomeRider');
Route::post('/join-riders', [App\Http\Controllers\AccountController::class, 'createRider'])->name('createRider');


Route::get('/place-order', [App\Http\Controllers\PagesController::class, 'placeOrder'])->name('placeOrder');
Route::post('/place-order', [App\Http\Controllers\OrderController::class, 'store'])->middleware('auth')->name('storeOrder');

Route::get('/view-my-order/{orderId}', [App\Http\Controllers\OrderController::class, 'viewOrder'])->middleware('auth')->name('viewOrder');
Route::get('/view-job/{orderId}', [App\Http\Controllers\OrderController::class, 'viewJob'])->middleware('auth')->name('viewJob');

Route::post('/add-bid', [App\Http\Controllers\BidController::class, 'addBid'])->middleware('auth')->name('addBid');
Route::get('/accept-bid/{bidId}', [App\Http\Controllers\BidController::class, 'acceptBid'])->middleware('auth')->name('acceptBid');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/dash-profile', [App\Http\Controllers\DashboardController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/dashboard/order/{orderId}', [App\Http\Controllers\DashboardController::class, 'order'])->middleware('auth')->name('viewDashOrder');
Route::get('/dashboard/finish-order/{orderId}/{bidId}', [App\Http\Controllers\DashboardController::class, 'finishOrder'])->middleware('auth')->name('finishOrder');




