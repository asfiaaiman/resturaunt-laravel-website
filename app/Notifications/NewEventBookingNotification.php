<?php

namespace App\Notifications;

use App\Models\EventBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEventBookingNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected EventBooking $booking,
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $event = $this->booking->event;

        return (new MailMessage)
            ->subject('New Event Booking Received')
            ->view('emails.event-request-to-admin', [
                'title' => 'New Event Booking Received',
                'greeting' => 'Hello!',
                'intro' => 'A new event booking has been received.',
                'lines' => [
                    'Event' => $event?->title ?? 'N/A',
                    'Name' => $this->booking->name,
                    'Email' => $this->booking->email,
                    'Phone' => $this->booking->phone ?? 'N/A',
                    'Date' => $this->booking->date ?? 'N/A',
                    'Time' => $this->booking->time ?? 'N/A',
                    'People' => $this->booking->people ?? 'N/A',
                    'Message' => $this->booking->message ?? 'N/A',
                ],
                'footer' => 'You can manage this booking from the admin panel under Event Bookings.',
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'event_id' => $this->booking->event_id,
            'event_title' => $this->booking->event?->title,
            'name' => $this->booking->name,
            'email' => $this->booking->email,
            'phone' => $this->booking->phone,
            'date' => $this->booking->date,
            'time' => $this->booking->time,
            'people' => $this->booking->people,
        ];
    }
}


