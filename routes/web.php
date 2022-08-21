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
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/short', [App\Http\Controllers\shortUrlController::class, 'insert'])->name('success');
    Route::post('/short', [App\Http\Controllers\shortUrlController::class, 'insert'])->name('short');
    Route::get('/manage_account', [App\Http\Controllers\shortUrlController::class, 'index'])->name('manage_account');
    Route::get('/click_edit/{id}', [App\Http\Controllers\shortUrlController::class, 'edit'])->name('manage_account');
    Route::get('/click_delete/{id}', [App\Http\Controllers\shortUrlController::class, 'delete'])->name('manage_account');

