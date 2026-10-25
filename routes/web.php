<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Models\RoomType;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/create',[RoomController::class, 'create'])->name('rooms.create');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
Route::delete('rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

Route::get('roomTypes', [RoomTypeController::class, 'index'])->name('roomTypes.index');
Route::get('/roomTypes/create', [RoomTypeController::class, 'create'])->name('roomTypes.create');
Route::post('/roomTypes', [RoomTypeController::class, 'store'])->name('roomTypes.store');
Route::get('/roomTypes/{id}', [RoomTypeController::class, 'show'])->name('roomTypes.show');
Route::get('roomTypes/{id}/edit', [RoomTypeController::class, 'edit'])->name('roomTypes.edit');
Route::put('roomTypes/{id}', [RoomTypeController::class, 'update'])->name('roomTypes.update');
Route::delete('roomTypes/{id}', [RoomTypeController::class, 'destroy'])->name('roomTypes.destroy');
