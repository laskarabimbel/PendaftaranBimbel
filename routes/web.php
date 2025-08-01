<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranBimbelController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PendaftaranBimbelController::class, 'create'])->name('pendaftaran-bimbel.create');
Route::post('/', [PendaftaranBimbelController::class, 'store'])->name('pendaftaran-bimbel.store');
Route::get('/selesai', [PendaftaranBimbelController::class, 'selesai'])->name('pendaftaran-bimbel.selesai');

// matikan route ini jika .env email sudah di seting
Route::get('/register', function () {
    return redirect()->back();
})->name('register');

Route::get('/forgot-password', function () {
    return redirect()->back();
})->name('password.request')->middleware(['guest']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/change-profile-avatar', [DashboardController::class, 'changeAvatar'])->name('change-profile-avatar');
    Route::delete('/remove-profile-avatar', [DashboardController::class, 'removeAvatar'])->name('remove-profile-avatar');

    // route untuk admin
    Route::middleware(['can:admin'])->group(function () {
        Route::resources([
            'user' => UserController::class,
            'pendaftaran' => PendaftaranController::class,
        ]);
        Route::get('pendaftaran/{id}/download', [PendaftaranController::class, 'download'])->name('pendaftaran.download');
    });
});
