<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

Route::get('/', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/results', [SearchController::class, 'results'])->name('search.results');

Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {

    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');

    // Bookings
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    // Rooms
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

    // Room Types
    Route::get('/roomTypes', [RoomTypeController::class, 'index'])->name('roomTypes.index');
    Route::get('/roomTypes/create', [RoomTypeController::class, 'create'])->name('roomTypes.create');
    Route::post('/roomTypes', [RoomTypeController::class, 'store'])->name('roomTypes.store');
    Route::get('/roomTypes/{id}', [RoomTypeController::class, 'show'])->name('roomTypes.show');
    Route::get('/roomTypes/{id}/edit', [RoomTypeController::class, 'edit'])->name('roomTypes.edit');
    Route::put('/roomTypes/{id}', [RoomTypeController::class, 'update'])->name('roomTypes.update');
    Route::delete('/roomTypes/{id}', [RoomTypeController::class, 'destroy'])->name('roomTypes.destroy');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});



require __DIR__.'/auth.php';
