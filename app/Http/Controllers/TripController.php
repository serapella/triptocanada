<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\View\View;

class TripController extends Controller
{
    public function index(): View
    {
        $trips = Trip::with('bookings')
            ->orderBy('start_date')
            ->get();

        return view('trips.index', compact('trips'));
    }
}
