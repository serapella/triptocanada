<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\BookingController;

Route::get('/trips', [TripController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
