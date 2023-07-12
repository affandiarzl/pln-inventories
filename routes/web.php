<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', function(){
    return view('dashboard');
});
Route::get('/barang', [BarangController::class, 'index'])-> name('barang.index');
Route::get('/satuan', [SatuanController::class, 'index'])-> name('satuan.index');
Route::get('/kategori', [KategoriController::class, 'index'])-> name('kategori.index');
Route::get('/ruangan', [RuanganController::class, 'index'])-> name('ruangan.index');
Route::post('/store-satuan', [SatuanController::class, 'store'])-> name('satuan.store');
Route::post('/update-satuan/{id}', [SatuanController::class, 'update'])-> name('satuan.update');
Route::delete('/delete-satuan/{id}', [SatuanController::class, 'delete'])-> name('satuan.delete');