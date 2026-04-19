<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Models\Room;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $rooms = Room::all(); // Ambil semua data kamar dari database
            
        // Tampilkan view dashboard dengan data kamar
        return view('dashboard', ['rooms' => $rooms]);
    })->name('dashboard');

    Route::get('/pesanan-saya', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/kamar/{room}/pesan', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/kamar/{room}/pesan', [ReservationController::class, 'store'])->name('reservations.store');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    // Route untuk admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route untuk memperbarui status reservasi
    Route::patch('/admin/pesanan/{reservation}/status', [AdminController::class, 'updateStatus'])->name('admin.reservasi.update');

    Route::get('/admin/kamar/tambah', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/kamar', [RoomController::class, 'store'])->name('admin.rooms.store');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
