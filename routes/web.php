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
Route::resource('/category', CategoryController::class);
Route::resource('/menu', MenuController::class);
Route::resource('/stock', StockController::class);
Route::resource('/jenis', JenisController::class);
Route::resource('/meja', MejaController::class);
Route::resource('/pelanggan', PelangganController::class);
Route::resource('/pemesanan', PemesananController::class);
Route::resource('/karyawan', KaryawanController::class);
