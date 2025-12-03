<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventBooking;
use Illuminate\Http\Request;

class EventBookingAdminController extends Controller
{
    public function index()
    {
        $bookings = EventBooking::with('event')->latest()->get();

        return view('admin.event_bookings.index')->with('bookings', $bookings);
    }

    public function updateStatus(Request $request, EventBooking $booking)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        $booking->status = $request->input('status');
        $booking->save();

        return back();
    }
}


