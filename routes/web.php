<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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


Route::group(['middleware' => 'auth'], function(){

    Route::get('/', [HomeController::class, 'dashboard']);
    Route::get('/about', [HomeController::class, 'about']);
    Route::get('/contact_us', [HomeController::class, 'contact']);
    
    // Route Admin
    Route::group(['middleware' => ['userLogin:3']], function(){
        // Category
        Route::resource('/category', CategoryController::class);
        Route::get('/category/export/excel', [CategoryController::class, 'export']);
        Route::post('/category/import', [CategoryController::class, 'import'])->name('import_category');
        
        // Menu
        Route::resource('/menu', MenuController::class);
        Route::get('/menu/export/excel', [MenuController::class, 'export']);
        Route::post('/menu/import', [MenuController::class, 'import'])->name('import_menu');
        
        // Stock
        Route::resource('/stock', StockController::class);
        Route::get('/stock/export/excel', [StockController::class, 'export']);
        Route::post('/stock/import', [StockController::class, 'import'])->name('import_stock');
        
        // Jenis
        Route::resource('/jenis', JenisController::class);
        Route::get('/jenis/export/excel', [JenisController::class, 'export']);
        Route::post('/jenis/import', [JenisController::class, 'import'])->name('import_jenis');
        
        // Meja
        Route::resource('/meja', MejaController::class);
        Route::get('/meja/export/excel', [MejaController::class, 'export']);
        Route::post('/meja/import', [MejaController::class, 'import'])->name('import_meja');
        
        // Pelanggan
        Route::resource('/pelanggan', PelangganController::class);
        Route::get('/pelanggan/export/excel', [PelangganController::class, 'export']);
        Route::post('/pelanggan/import', [PelangganController::class, 'import'])->name('import_pelanggan');
        
        // Karyawan
        Route::resource('/karyawan', KaryawanController::class);
        Route::get('/karyawan/export/excel', [KaryawanController::class, 'export']);
        Route::post('/karyawan/import', [KaryawanController::class, 'import'])->name('import_karyawan');

        // Absensi Karyawan
        Route::resource('/absensi', AbsensiController::class);
        Route::get('/absensi/export/excel', [AbsensiController::class, 'export']);
        Route::post('/absensi/import', [AbsensiController::class, 'import'])->name('import_absensi');
        Route::get('/generate-pdf', [AbsensiController::class,'generatePdf'])->name('generate-pdf');
        
        // Produk Titipan
        Route::resource('/produk_titipan', ProdukTitipanController::class);
        Route::get('data', [ProdukTitipanController::class, 'dataProduk']);
        Route::get('/produk_titipan/export/excel', [ProdukTitipanController::class, 'export']);
        Route::post('/import_produk_titipan', [ProdukTitipanController::class, 'import'])->name('import_produk_titipan');
    });

    // Route untuk kasir
    Route::group(['middleware' => ['userLogin:2']], function(){
        
        // Route::resource('/menu', MenuController::class);
        // Route::resource('/jenis', JenisController::class);
        Route::resource('/pemesanan', PemesananController::class);
        // Route::get('/jenis/{jenis}', [JenisController::class, 'show']);
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/nota/{nofaktor}', [TransaksiController::class, 'faktur']);
    });

});

// Login
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
