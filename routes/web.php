<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'dashboard']);
Route::get('/about', [HomeController::class, 'about']);

// Category
Route::resource('/category', CategoryController::class);
Route::get('/category/export/excel', [CategoryController::class, 'export']);

// Menu
Route::resource('/menu', MenuController::class);
Route::get('/menu/export/excel', [MenuController::class, 'export']);

// Stock
Route::resource('/stock', StockController::class);
Route::get('/stock/export/excel', [StockController::class, 'export']);

// Jenis
Route::resource('/jenis', JenisController::class);
Route::get('/jenis/export/excel', [JenisController::class, 'export']);

// Meja
Route::resource('/meja', MejaController::class);
Route::get('/meja/export/excel', [MejaController::class, 'export']);

// Pelanggan
Route::resource('/pelanggan', PelangganController::class);
Route::get('/pelanggan/export/excel', [PelangganController::class, 'export']);


// Karyawan
Route::resource('/karyawan', KaryawanController::class);
Route::get('/karyawan/export/excel', [KaryawanController::class, 'export']); //--------------->



Route::resource('/pemesanan', PemesananController::class);
// Route::get('/jenis/{jenis}', [JenisController::class, 'show']);
Route::resource('/transaksi', TransaksiController::class);
Route::get('/nota/{nofaktor}', [TransaksiController::class, 'faktur']);


