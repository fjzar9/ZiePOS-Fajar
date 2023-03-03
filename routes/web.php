<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

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

Route::middleware(['auth'])->group(function() {

    Route::get('home', [DashboardController::class, 'index']);

    Route::get('profile', [ProfileController::class, 'index']);

    Route::post('logout', [LoginController::class, 'logout']);

});

Route::middleware(['guest'])->group(function() {

    Route::get('login', [LoginController::class, 'index'])->name('login');

    Route::post('login', [LoginController::class, 'authenticate']);
    
    Route::get('register', [RegisterController::class, 'index']);
    
    Route::post('register', [RegisterController::class, 'store']);

});

Route::middleware(['auth', 'role:Owner'])->group(function() {

    Route::resource('produk', ProdukController::class);

    Route::resource('satuan', SatuanController::class);
    
    Route::resource('barang', BarangController::class);
    
    Route::resource('bank', BankController::class);
    
    Route::resource('pemasok', PemasokController::class);
    
    Route::resource('pelanggan', PelangganController::class);
    
    Route::resource('pembelian', PembelianController::class);
    
    Route::get('dataPembelian',[PembelianController::class, 'dataPembelian']);
    
    Route::get('printPembelian/{id}',[PembelianController::class, 'printPembelian']);
    
    Route::get('printLaporanPembelian', [DetailPembelianController::class, 'printLaporanPembelian']);

    Route::resource('LaporanPembelian', DetailPembelianController::class);
    
    Route::resource('penjualan', PenjualanController::class);
    
    Route::get('dataPenjualan',[PenjualanController::class, 'dataPenjualan']);
    
    Route::get('printPenjualan/{id}',[PenjualanController::class, 'printPenjualan']);

    Route::get('printLaporanPenjualan', [DetailPenjualanController::class, 'printLaporanPenjualan']);
    
    Route::resource('LaporanPenjualan', DetailPenjualanController::class);

});

Route::middleware(['auth', 'role:Admin'])->group(function() {

    Route::resource('produk', ProdukController::class);

    Route::resource('satuan', SatuanController::class);
    
    Route::resource('barang', BarangController::class);
    
    Route::resource('bank', BankController::class);
    
    Route::resource('pemasok', PemasokController::class);
    
    Route::resource('pelanggan', PelangganController::class);
    
    Route::resource('pembelian', PembelianController::class);
    
    Route::get('dataPembelian',[PembelianController::class, 'dataPembelian']);
    
    Route::get('printPembelian/{id}',[PembelianController::class, 'printPembelian']);
    
    Route::resource('penjualan', PenjualanController::class);
    
    Route::get('dataPenjualan',[PenjualanController::class, 'dataPenjualan']);
    
    Route::get('printPenjualan/{id}',[PenjualanController::class, 'printPenjualan']);

});

Route::middleware(['auth', 'role:Kasir'])->group(function() {

    Route::resource('pelanggan', PelangganController::class);
    
    Route::resource('pembelian', PembelianController::class);
    
    Route::get('dataPembelian',[PembelianController::class, 'dataPembelian']);
    
    Route::get('printPembelian/{id}',[PembelianController::class, 'printPembelian']);
    
    Route::resource('penjualan', PenjualanController::class);
    
    Route::get('dataPenjualan',[PenjualanController::class, 'dataPenjualan']);
    
    Route::get('printPenjualan/{id}',[PenjualanController::class, 'printPenjualan']);

});