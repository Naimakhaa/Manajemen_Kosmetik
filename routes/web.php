<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/', [MenuController::class, 'index']); // ← tambahkan ini

// Menampilkan daftar menu
Route::get('/menu', [MenuController::class, 'index']);

// Menampilkan form tambah menu
Route::get('/tambahmenu', [MenuController::class, 'create']);

// Menyimpan menu baru
Route::post('/tambahmenu', [MenuController::class, 'store']);

// Menampilkan form edit menu
Route::get('/editmenu/{id}', [MenuController::class, 'edit']);

// Update data menu
Route::post('/editmenu/{id}', [MenuController::class, 'update']);

// Hapus data menu
Route::get('/hapusmenu/{id}', [MenuController::class, 'destroy']);
