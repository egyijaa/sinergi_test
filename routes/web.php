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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('barang')->name('barang.')->group(function () {
    Route::get('', [App\Http\Controllers\MBarangController::class, 'index'])->name('index');
    Route::post('store', [App\Http\Controllers\MBarangController::class, 'store'])->name('store');
    Route::put('update', [App\Http\Controllers\MBarangController::class, 'update'])->name('update');
    Route::delete('delete', [App\Http\Controllers\MBarangController::class, 'delete'])->name('delete');
});
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('', [App\Http\Controllers\MCustomerController::class, 'index'])->name('index');
    Route::post('store', [App\Http\Controllers\MCustomerController::class, 'store'])->name('store');
    Route::put('update', [App\Http\Controllers\MCustomerController::class, 'update'])->name('update');
    Route::delete('delete', [App\Http\Controllers\MCustomerController::class, 'delete'])->name('delete');
});
Route::prefix('transaksi')->name('transaksi.')->group(function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'formInput'])->name('formInput');
    Route::get('getBarang', [App\Http\Controllers\HomeController::class, 'getBarang'])->name('getBarang');
    Route::get('getBarangUbah', [App\Http\Controllers\HomeController::class, 'getBarangUbah'])->name('getBarangUbah');
    Route::get('hapusBarang', [App\Http\Controllers\HomeController::class, 'hapusBarang'])->name('hapusBarang');
    Route::post('store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
    Route::put('update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
    Route::delete('delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
});

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
