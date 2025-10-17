<?php

use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', [LoginController::class, 'showLogin']);
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('/logout', [LoginController::class, 'actionLogout'])->name('actionLogout');

//yang penjualan
Route::resource('penjualan', PenjualanController::class);
Route::get('/penjualan/cetak/{id}', [PenjualanController::class, 'cetak'])->name('penjualan.cetak');
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan/simpan', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/penjualan/edit{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::put('/penjualan/update{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::delete('/penjualan/destroy{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::put('/penjualan/update2/{id}', [PenjualanController::class, 'update']);

//yang barang
Route::get('/barang',[BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/simpan', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/update{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/destroy{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

//yang admin
Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/simpan', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/edit{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update{id}', [AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/destroy{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

//yang detail penjualan
Route::get('/detail_penjualan',[DetailPenjualanController::class, 'index'])->name('detail_penjualan.index');
Route::get('/detail_penjualan/create', [DetailPenjualanController::class, 'create'])->name('detail_penjualan.create');
Route::post('/detail_penjualan/simpan', [DetailPenjualanController::class, 'store'])->name('detail_penjualan.store');
Route::get('/detail_penjualan/edit{id}', [DetailPenjualanController::class, 'edit'])->name('detail_penjualan.edit');
Route::put('/detail_penjualan/update{id}', [DetailPenjualanController::class, 'update'])->name('detail_penjualan.update');
Route::delete('/detail_penjualan/destroy{id}', [DetailPenjualanController::class, 'destroy'])->name('detail_penjualan.destroy');