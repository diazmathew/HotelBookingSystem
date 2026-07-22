<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class ReportController extends Controller
{
    /**
     * Display booking reports.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'roomType'])
            ->latest()
            ->get();

        return view('admin.reports.index', compact('bookings'));
    }
}