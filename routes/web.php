<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\SewaLokerController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    //crud loker
    Route::resource('lokers', LokerController::class);

    //crud user
    Route::resource('users', UserController::class);

    //fitur sewa loker
    Route::get('sewa', [SewaLokerController::class, 'index'])->name('sewa.index');
    Route::get('sewa/create', [SewaLokerController::class, 'create'])->name('sewa.create');
    Route::post('sewa', [SewaLokerController::class, 'store'])->name('sewa.store');
    Route::get('sewa/{id}', [SewaLokerController::class, 'show'])->name('sewa.show');
    Route::get('sewa/{id}/open', [SewaLokerController::class, 'open'])->name('sewa.open');
    Route::get('sewa/{id}/selesai', [SewaLokerController::class, 'selesai'])->name('sewa.selesai');



    //fitur pembayaran
    Route::get('pembayarans', [PembayaranController::class, 'index'])->name('pembayarans.index');
    Route::get('pembayarans/{id}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayarans.konfirmasi');
    Route::post('pembayarans/{id}/update', [PembayaranController::class, 'updateStatus'])->name('pembayarans.updateStatus');
});

require __DIR__ . '/auth.php';
