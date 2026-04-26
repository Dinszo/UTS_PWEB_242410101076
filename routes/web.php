<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login-process', [PageController::class, 'dashboard'])->name('login.process');

Route::get('/dashboard', [PageController::class, 'showDashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');

Route::post('/logout', [PageController::class, 'logout'])->name('logout');