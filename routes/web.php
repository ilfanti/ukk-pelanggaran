<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PelanggaranController;

// AUTH
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/siswa', function () { return view('siswa.index'); })->middleware('auth');
Route::get('/kelas', function () { return view('kelas.index'); })->middleware('auth');
Route::get('/jenis', function () { return view('jenis.index'); })->middleware('auth');
Route::get('/pelanggaran', function () { return view('pelanggaran.index'); })->middleware('auth');

// HOME
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

// RESOURCE ROUTES
Route::resource('siswa', SiswaController::class);
Route::resource('jenis', JenisController::class);
Route::resource('kelas', KelasController::class);
Route::resource('pelanggaran', PelanggaranController::class);
