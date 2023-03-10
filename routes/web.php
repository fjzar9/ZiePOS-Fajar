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
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\UserController;

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

    Route::get('home', [DashboardController::class, 'index'])->name('home');

        Route::resource('produk', ProdukController::class);
    
        Route::resource('satuan', SatuanController::class);
        
        Route::resource('barang', BarangController::class);
        
        Route::resource('bank', BankController::class);
        
        Route::resource('pemasok', PemasokController::class);
        
        Route::resource('pelanggan', PelangganController::class);
        
        Route::resource('pembelian', PembelianController::class);
        
        Route::get('dataPembelian',[PembelianController::class, 'dataPembelian']);
        
        Route::get('printPembelian/{id}',[PembelianController::class, 'printPembelian']);
        
        Route::get('printLaporanPembelian/{tanggal_awal}/{tanggal_akhir}', [DetailPembelianController::class, 'printLaporanPembelian'])->name('printLaporanPembelian');
    
        Route::resource('LaporanPembelian', DetailPembelianController::class);
    
        Route::get('export/pembelian/{tanggal_awak}/{tanggal_akhir}', [DetailPembelianController::class, 'exportData'])->name('export-pembelian');

        Route::post('import/pembelian', [DetailPembelianController::class, 'importData'])->name('import-pembelian');

        Route::resource('penjualan', PenjualanController::class);
        
        Route::get('dataPenjualan',[PenjualanController::class, 'dataPenjualan']);
        
        Route::get('printPenjualan/{id}',[PenjualanController::class, 'printPenjualan']);
    
        Route::get('printLaporanPenjualan/{tanggal_awal}/{tanggal_akhir}', [DetailPenjualanController::class, 'printLaporanPenjualan'])->name('printLaporanPenjualan');
        
        Route::resource('LaporanPenjualan', DetailPenjualanController::class);

        // Route::get('profile', [ProfileController::class, 'index']);
        Route::resource('profile', UserController::class);

        Route::post('editPassword', [UserController::class, 'editPassword'])->name('editPassword');

        Route::post('logout', [LoginController::class, 'logout']);

        Route::get('data_karyawan', [SimulasiController::class, 'index']);
    

    // Route::group(['prefix'=>'O','middleware'=>'isOwner'], function() {

    //     Route::get('home', [DashboardController::class, 'index'])->name('O.home');

    //     Route::resource('produk', ProdukController::class);
    
    //     Route::resource('satuan', SatuanController::class);
        
    //     Route::resource('barang', BarangController::class);
        
    //     Route::resource('bank', BankController::class);
        
    //     Route::resource('pemasok', PemasokController::class);
        
    //     Route::resource('pelanggan', PelangganController::class);
        
    //     Route::resource('pembelian', PembelianController::class);
        
    //     Route::get('dataPembelian',[PembelianController::class, 'dataPembelian']);
        
    //     Route::get('printPembelian/{id}',[PembelianController::class, 'printPembelian']);
        
    //     Route::get('printLaporanPembelian', [DetailPembelianController::class, 'printLaporanPembelian']);
    
    //     Route::resource('LaporanPembelian', DetailPembelianController::class);
    
    //     Route::get('export/pembelian', [DetailPembelianController::class, 'exportData'])->name('export-pembelian');
        
    //     Route::resource('penjualan', PenjualanController::class);
        
    //     Route::get('dataPenjualan',[PenjualanController::class, 'dataPenjualan']);
        
    //     Route::get('printPenjualan/{id}',[PenjualanController::class, 'printPenjualan']);
    
    //     Route::get('printLaporanPenjualan', [DetailPenjualanController::class, 'printLaporanPenjualan']);
        
    //     Route::resource('LaporanPenjualan', DetailPenjualanController::class);

    //     Route::get('profile', [ProfileController::class, 'index']);

    //     Route::post('logout', [LoginController::class, 'logout']);
    
    // });

    // Route::group(['prefix'=>'A','middleware'=>'isAdmin'], function() {

    //     Route::get('home', [DashboardController::class, 'index'])->name('A.home');

    //     Route::resource('produk', ProdukController::class);
    
    //     Route::resource('satuan', SatuanController::class);
        
    //     Route::resource('barang', BarangController::class);
        
    //     Route::resource('bank', BankController::class);
        
    //     Route::resource('pemasok', PemasokController::class);
        
    //     Route::resource('pelanggan', PelangganController::class);
        
    //     Route::resource('pembelian', PembelianController::class);
        
    //     Route::get('dataPembelian',[PembelianController::class, 'dataPembelian']);
        
    //     Route::get('printPembelian/{id}',[PembelianController::class, 'printPembelian']);
        
    //     Route::resource('penjualan', PenjualanController::class);
        
    //     Route::get('dataPenjualan',[PenjualanController::class, 'dataPenjualan']);
        
    //     Route::get('printPenjualan/{id}',[PenjualanController::class, 'printPenjualan']);

    //     Route::get('profile', [ProfileController::class, 'index']);

    //     Route::post('logout', [LoginController::class, 'logout']);
    
    // });

    // Route::group(['prefix'=>'K','middleware'=>'isKasir'], function() {

    //     Route::get('home', [DashboardController::class, 'index'])->name('K.home');
        
    //     Route::resource('pelanggan', PelangganController::class);
        
    //     Route::resource('pembelian', PembelianController::class);
        
    //     Route::get('dataPembelian',[PembelianController::class, 'dataPembelian']);
        
    //     Route::get('printPembelian/{id}',[PembelianController::class, 'printPembelian']);
        
    //     Route::resource('penjualan', PenjualanController::class);
        
    //     Route::get('dataPenjualan',[PenjualanController::class, 'dataPenjualan']);
        
    //     Route::get('printPenjualan/{id}',[PenjualanController::class, 'printPenjualan']);

    //     Route::get('profile', [ProfileController::class, 'index']);

    //     Route::post('logout', [LoginController::class, 'logout']);
    
    // });

});

Route::middleware(['guest'])->group(function() {

    Route::get('login', [LoginController::class, 'index'])->name('login');

    Route::post('login', [LoginController::class, 'authenticate']);

    // Route::resource('register', RegisterController::class);
    
    Route::get('register', [RegisterController::class, 'index']);
    
    Route::post('register', [RegisterController::class, 'store']);

    Route::patch('register', [RegisterController::class, 'update']);


    // Route::patch('register', [RegisterController::class, 'update'])->name('profile.update');

});