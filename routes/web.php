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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('antigens', \App\Http\Controllers\AntigenController::class)
    ->middleware('auth')->except('show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('register', \App\Http\Controllers\RegisterController::class);
Route::get('/voucher/{id}', [App\Http\Controllers\RegisterController::class, 'getVoucher'])->name('voucher');
