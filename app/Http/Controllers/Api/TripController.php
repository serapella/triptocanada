<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\JsonResponse;

class TripController extends Controller
{
    public function index(): JsonResponse
    {
        $trips = Trip::all();
        
        return response()->json($trips);
    }
}
