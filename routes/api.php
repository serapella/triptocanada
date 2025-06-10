<?php

use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/trips', [TripController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/trips/{trip}', [BookingController::class, 'show']);
