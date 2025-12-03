<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventBookingRequest;
use App\Models\EventBooking;
use App\Models\User;
use App\Notifications\NewEventBookingNotification;
use Illuminate\Support\Facades\Notification;

class EventBookingController extends Controller
{
    public function store(StoreEventBookingRequest $request)
    {
        $booking = EventBooking::create($request->validated());

        $admins = User::all();
        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewEventBookingNotification($booking));
        }

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Your event booking request has been sent. We will contact you to confirm the details.',
            ]);
        }

        return redirect()->route('home')->with('success', 'Your event booking request has been sent. We will contact you to confirm the details.');
    }
}


