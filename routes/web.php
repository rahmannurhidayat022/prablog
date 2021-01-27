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

Route::get('/', [App\Http\Controllers\LandingController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\ArtikelController::class, 'index'])->name('home');
Route::post('/add', [App\Http\Controllers\ArtikelController::class, 'store'])->name('add');
Route::post('/update', [App\Http\Controllers\ArtikelController::class, 'update'])->name('update');
Route::get('/edit/{id}', [App\Http\Controllers\ArtikelController::class, 'updatepage']);
Route::get('/delete/{id}', [App\Http\Controllers\ArtikelController::class, 'destroy']);
Route::get('/detail/{id}', [App\Http\Controllers\LandingController::class, 'detail']);
Route::get('/artikel/cari', [App\Http\Controllers\LandingController::class, 'cari']);

