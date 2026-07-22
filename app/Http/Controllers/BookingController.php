<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Welcome Page
     */
    public function welcome($name)
    {
        return view('welcome', compact('name'));
    }

    /**
     * Show Booking Form
     */
    public function create()
    {
        $roomTypes = RoomType::all();

        return view('booking.create', compact('roomTypes'));
    }

    /**
     * Store Booking
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_type_id' => 'required|exists:room_types,id',
            'payment_receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        // Prevent double booking (overlapping stays for the same room type)
        $existingBooking = Booking::where('room_type_id', $request->room_type_id)
            ->where('check_in_date', '<', $request->check_out_date)
            ->where('check_out_date', '>', $request->check_in_date)
            ->exists();

        if ($existingBooking) {

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'This room type is already booked for the selected dates.',
                ], 422);
            }

            return back()
                ->withInput()
                ->with('error', 'This room type is already booked for the selected dates.');
        }

        $receipt = null;

        if ($request->hasFile('payment_receipt')) {

            $receipt = $request->file('payment_receipt')->store(
                'receipts',
                'public'
            );

        }

        $booking = Booking::create([

            'user_id' => Auth::id(),

            'customer_name' => $request->customer_name,

            'check_in_date' => $request->check_in_date,

            'check_out_date' => $request->check_out_date,

            'room_type_id' => $request->room_type_id,

            'payment_receipt' => $receipt,

            'status' => 'Pending',

        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Booking submitted successfully.',
                'booking' => $booking->load('roomType'),
            ]);
        }

        return redirect()
            ->route('booking.create')
            ->with('success', 'Booking submitted successfully.');
    }

    /**
     * Admin - View All Bookings
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'roomType'])
            ->latest()
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Confirm Booking
     */
    public function approve(Request $request, Booking $booking)
    {
        $booking->update([
            'status' => 'Confirmed',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Booking confirmed successfully.',
                'status' => $booking->status,
            ]);
        }

        return back()->with('success', 'Booking confirmed successfully.');
    }

    /**
     * Cancel Booking
     */
    public function cancel(Request $request, Booking $booking)
    {
        $booking->update([
            'status' => 'Cancelled',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Booking cancelled successfully.',
                'status' => $booking->status,
            ]);
        }

        return back()->with('success', 'Booking cancelled successfully.');
    }

    /**
     * Delete Booking
     */
    public function destroy(Request $request, Booking $booking)
    {
        if ($booking->payment_receipt) {

            Storage::disk('public')->delete($booking->payment_receipt);

        }

        $booking->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Booking deleted successfully.',
            ]);
        }

        return back()->with('success', 'Booking deleted successfully.');
    }

    /**
     * User - My Bookings
     */
    public function myBookings()
    {
        $bookings = Booking::with('roomType')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.bookings.index', compact('bookings'));
    }

    /**
     * Calendar Events
     */
    public function calendarEvents(Request $request)
    {
        $query = Booking::with('roomType');

        if ($request->filled('room_type')) {
            $query->where('room_type_id', $request->room_type);
        }

        $bookings = $query->get();

        $events = [];

        foreach ($bookings as $booking) {

            $color = match($booking->status){
                'Confirmed' => '#22c55e',
                'Pending'   => '#f59e0b',
                'Cancelled' => '#ef4444',
                default     => '#3b82f6'
            };

            $events[] = [
                'title' => $booking->roomType->room_name,
                'start' => $booking->check_in_date,
                'end' => $booking->check_out_date,
                'color' => $color,
                'extendedProps' => [
                    'customer' => $booking->customer_name,
                    'checkOut' => $booking->check_out_date,
                    'status' => $booking->status,
                ]
            ];
        }

        return response()->json($events);
    }
}
