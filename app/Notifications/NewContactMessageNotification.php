<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactMessageNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Message $messageModel,
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Message Received')
            ->view('emails.contact-request-to-admin', [
                'title' => 'New Contact Message Received',
                'greeting' => 'Hello!',
                'intro' => 'A new contact message has been submitted from the website.',
                'lines' => [
                    'Name' => $this->messageModel->name,
                    'Email' => $this->messageModel->email,
                    'Subject' => $this->messageModel->subject,
                    'Message' => $this->messageModel->message,
                ],
                'footer' => 'You can view and manage this message from the admin panel under Messages.',
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message_id' => $this->messageModel->id,
            'name' => $this->messageModel->name,
            'email' => $this->messageModel->email,
            'subject' => $this->messageModel->subject,
        ];
    }
}


