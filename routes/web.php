<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

Route::get('/about', function () {
    return view('about');
})->name('about.index');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home-view', function () {
    return view('home');
})->name('home.view');

Route::resource('buku', BukuController::class);
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

Route::get('/data-buku', [DashboardController::class, 'dataBuku'])->name('data.buku');
Route::get('/data-buku2', [DashboardController::class, 'dataBuku2'])->name('data.buku2');

Route::resource('peminjaman', PeminjamanController::class);
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');

Route::resource('pengembalian', PengembalianController::class);
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/data-pengguna',[DashboardController::class,'showDataPengguna'])->name('dashboard.showDataPengguna')->middleware('admin');
});

Route::group(['middleware' => ['admin']], function(){
    Route::get('/data-pengguna', [DashboardController::class, 'showDataPengguna'])->name('dashboard.showDataPengguna');
});

Route::get('/anggota', [DashboardController::class, 'showDataPengguna'])->name('anggota');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
