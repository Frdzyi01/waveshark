<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing');
});
Route::get('/booking', function () { return view('booking'); });
Route::get('/booking-langkawi', function () { return view('booking/booking-langkawi'); });
Route::get('/booking-stjohnislands', function () { return view('booking/booking-stjohnislands'); });
Route::get('/booking-sabah', function () { return view('booking/booking-sabah'); });
