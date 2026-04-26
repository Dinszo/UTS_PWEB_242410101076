<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login-process', [PageController::class, 'dashboard'])->name('login.process');

Route::get('/dashboard', [PageController::class, 'showDashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::post('/pengelolaan/tambah', [PageController::class, 'tambahProduk'])->name('pengelolaan.tambah');
Route::post('/pengelolaan/edit/{id}', [PageController::class, 'editProduk'])->name('pengelolaan.edit');
Route::post('/pengelolaan/hapus/{id}', [PageController::class, 'hapusProduk'])->name('pengelolaan.hapus');
Route::post('/pengelolaan/stok/tambah/{id}', [PageController::class, 'tambahStok'])->name('pengelolaan.stok.tambah');
Route::post('/pengelolaan/stok/kurang/{id}', [PageController::class, 'kurangStok'])->name('pengelolaan.stok.kurang');
Route::post('/logout', [PageController::class, 'logout'])->name('logout');