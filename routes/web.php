<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuCon;
use App\Http\Controllers\PembelianCon;
use Illuminate\Support\Facades\Auth;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Menu Makanan
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

// Artikel
Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel');

// Kalkulator (placeholder)
Route::get('/kalkulator', function () {
    return view('kalkulator');
})->name('kalkulator');
// oudasndoasd


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// routes/web.php
Route::post('/favorites/add', [FavoriteController::class, 'add'])->middleware('auth');
