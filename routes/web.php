<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Frontend Routes
Route::get('/booking-langkawi', [\App\Http\Controllers\BookingController::class, 'langkawi']);
Route::get('/booking-stjohnislands', [\App\Http\Controllers\BookingController::class, 'stjohnislands']);
Route::get('/booking-sabah', [\App\Http\Controllers\BookingController::class, 'sabah']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::resource('admin/services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('admin/tour-packages', \App\Http\Controllers\Admin\TourPackageController::class);
});

require __DIR__ . '/auth.php';
