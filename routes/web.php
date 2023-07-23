<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangExtraController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SatuanController;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [Authcontroller::class, 'index']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })-> name('dashboard');

    Route::get('/barang', [BarangController::class, 'index'])-> name('barang.index');
    Route::get('/satuan', [SatuanController::class, 'index'])-> name('satuan.index');
    Route::get('/kategori', [KategoriController::class, 'index'])-> name('kategori.index');
    Route::get('/ruangan', [RuanganController::class, 'index'])-> name('ruangan.index');
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])-> name('barang-masuk.index');
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])-> name('barang-keluar.index');
    Route::get('/barang-extra', [BarangExtraController::class, 'index'])-> name('barang-extra.index');
    Route::post('/logout', [Authcontroller::class, 'logout'])-> name('logout');

    Route::post('/store-barang', [BarangController::class, 'store'])-> name('barang.store');
    Route::post('/update-barang/{id}', [BarangController::class, 'update'])-> name('barang.update');
    Route::delete('/delete-barang/{id}', [BarangController::class, 'delete'])-> name('barang.delete');
    Route::get('/export-barang', [BarangController::class, 'exportBarang'])-> name('barang.export');
    Route::post('/import-barang', [BarangController::class, 'importBarang'])-> name('barang.import');

    Route::post('/store-satuan', [SatuanController::class, 'store'])-> name('satuan.store');
    Route::post('/update-satuan/{id}', [SatuanController::class, 'update'])-> name('satuan.update');
    Route::delete('/delete-satuan/{id}', [SatuanController::class, 'delete'])-> name('satuan.delete');

    Route::post('/store-kategori', [KategoriController::class, 'store'])-> name('kategori.store');
    Route::post('/update-kategori/{id}', [KategoriController::class, 'update'])-> name('kategori.update');
    Route::delete('/delete-kategori/{id}', [KategoriController::class, 'delete'])-> name('kategori.delete');

    Route::post('/store-ruangan', [RuanganController::class, 'store'])-> name('ruangan.store');
    Route::post('/update-ruangan/{id}', [RuanganController::class, 'update'])-> name('ruangan.update');
    Route::delete('/delete-ruangan/{id}', [RuanganController::class, 'delete'])-> name('ruangan.delete');

    Route::post('/store-barang-masuk', [BarangMasukController::class, 'store'])-> name('barang-masuk.store');
    Route::post('/update-barang-masuk/{id}', [BarangMasukController::class, 'update'])-> name('barang-masuk.update');
    Route::delete('/delete-barang-masuk/{id}', [BarangMasukController::class, 'delete'])-> name('barang-masuk.delete');

    Route::post('/store-barang-keluar', [BarangKeluarController::class, 'store'])-> name('barang-keluar.store');
    Route::post('/update-barang-keluar/{id}', [BarangKeluarController::class, 'update'])-> name('barang-keluar.update');
    Route::delete('/delete-barang-keluar/{id}', [BarangKeluarController::class, 'delete'])-> name('barang-keluar.delete');

    Route::post('/store-barang-extra', [BarangExtraController::class, 'store'])-> name('barang-extra.store');
    Route::post('/update-barang-extra/{id}', [BarangExtraController::class, 'update'])-> name('barang-extra.update');
    Route::delete('/delete-barang-extra/{id}', [BarangExtraController::class, 'delete'])-> name('barang-extra.delete');
});
