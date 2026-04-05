<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;  // Tambahkan ini
use App\Http\Controllers\FavoriteController;  // Tambahkan ini
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Homepage - PAKAI CONTROLLER, jangan closure
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu Makanan (jika perlu halaman terpisah)
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');

// Artikel (jika perlu halaman terpisah)
Route::get('/artikel', [HomeController::class, 'artikel'])->name('artikel');

// Kalkulator
Route::get('/kalkulator', function () {
    return view('kalkulator');
})->name('kalkulator');

// Favorites
Route::post('/favorites/add', [FavoriteController::class, 'add'])->middleware('auth');

// Auth routes bawaan Laravel
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
