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
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\WalletController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('history',App\Http\Controllers\HistoryController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-----wallet--------------
Route::resource('wallet',  App\Http\Controllers\WalletController::class);
Route::post('/wallet/{wallet}/topup', 'App\Http\Controllers\WalletController@topup')->name('wallet.topup');
Route::post('/wallet/{wallet}/withdraw', 'App\Http\Controllers\WalletController@withdraw')->name('wallet.withdraw');

//------trade---------------
Route::resource('trade',  App\Http\Controllers\TradeController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
