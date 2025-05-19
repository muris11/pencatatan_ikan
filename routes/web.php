<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('login');
});

// ============================
// Routes untuk tamu (guest)
// ============================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
});

// ============================
// Logout (butuh auth)
// ============================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ============================
// Routes yang memerlukan login
// ============================
use App\Http\Controllers\NotificationController;

// ... kode lainnya ...

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Profil user
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updatePassword'])->name('profile.update');

    // Kirim notifikasi ikan
    Route::post('/ikan/{ikan}/notify', [IkanController::class, 'notify'])->name('ikan.notify');

    // Hapus notifikasi
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    // Resource CRUD routes
    Route::resource('ikan', IkanController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('kapal', KapalController::class);
    Route::resource('user', UserController::class);
});

