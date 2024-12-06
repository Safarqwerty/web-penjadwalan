<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminMataPelajaran;
use App\Http\Controllers\AdminPengajarController;
use App\Http\Controllers\AdminSiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\KelasSiswaController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('kelas', AdminKelasController::class);
    Route::resource('jadwal', AdminJadwalController::class);
    Route::resource('mataPelajaran', AdminMataPelajaran::class);
    Route::resource('pengajar', AdminPengajarController::class);
    Route::resource('siswa', AdminSiswaController::class);
    Route::resource('kelas-siswa', KelasSiswaController::class);
});

Route::middleware(['auth', 'role:pengajar'])->prefix('pengajar')->name('pengajar.')->group(function () {
    Route::get('dashboard', [PengajarController::class, 'dashboard'])->name('dashboard');
});

// Rute untuk Siswa
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
