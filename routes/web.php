<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenarikanDanaController;

Route::middleware('auth')->group(function () {
    Route::get('/', [PenarikanDanaController::class, 'dashboard'])->name('dashboard');
    Route::resource('penarikan_dana', PenarikanDanaController::class)->except(['show']);
    Route::get('penarikan_dana/export_pdf', [PenarikanDanaController::class, 'exportPdf'])->name('penarikan_dana.export_pdf');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Auth routes for guests only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('loginUser');
});
