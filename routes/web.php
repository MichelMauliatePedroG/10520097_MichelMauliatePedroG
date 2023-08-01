<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/create/{produk?}', [ProdukController::class, 'store']);
Route::get('/produk/{produk}/edit', [ProdukController::class,'edit'])->name('produk.edit');
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

//Pelanggan

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/pelanggan/create/{pelanggan?}', [PelangganController::class, 'store']);
Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class,'edit'])->name('pelanggan.edit');
Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

//Kategori
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index']);
Route::get('/kategori/buat', [App\Http\Controllers\KategoriController::class, 'buat']);
Route::post('/kategori/buat/{kategori?}', [App\Http\Controllers\KategoriController::class, 'store']);
Route::get('/kategori/{kategori}/edit', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
Route::delete('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.destroy');