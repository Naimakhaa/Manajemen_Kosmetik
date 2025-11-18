<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Arahkan halaman utama ke login
Route::get('/', function () {
    return redirect()->route('login');   // nama rute: 'login'
});

// Login
Route::get('/login', function () {
    return view('login.login');          // sesuai folder: resources/views/login/login.blade.php
})->name('login');                       // jangan 'login.login', cukup 'login'

// Proses login
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Menampilkan daftar menu
Route::get('/menu', [MenuController::class, 'index'])->middleware('auth');

// Menampilkan form tambah menu
Route::get('/tambahmenu', [MenuController::class, 'create'])->middleware('auth');

// Simpan menu baru
Route::post('/tambahmenu', [MenuController::class, 'store'])->middleware('auth');

// Edit menu
Route::get('/editmenu/{id}', [MenuController::class, 'edit'])->middleware('auth');

// Update menu
Route::post('/editmenu/{id}', [MenuController::class, 'update'])->middleware('auth');

// Hapus menu
Route::get('/hapusmenu/{id}', [MenuController::class, 'destroy'])->middleware('auth');
