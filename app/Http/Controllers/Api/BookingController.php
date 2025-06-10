<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        if (!$request->has('token')) {
            return response()->json(['error' => 'Token is required'], 401);
        }

        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'number_of_people' => 'required|integer|min:1',
            'token' => 'required|string'
        ]);

        $expectedToken = md5($validated['email'] . 'canadarocks');
        if ($validated['token'] !== $expectedToken) {
            return response()->json(['error' => 'Invalid token'], 403);
        }

        $booking = Booking::create([
            'trip_id' => $validated['trip_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'number_of_people' => $validated['number_of_people'],
            'status' => 'pending',
            // 'token' => $expectedToken['token']
        ]);

        return response()->json($booking, 201);
    }
}
