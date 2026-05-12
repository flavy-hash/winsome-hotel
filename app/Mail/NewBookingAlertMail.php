<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewBookingAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking) {}

    public function envelope(): Envelope
    {
        $ref = str_pad($this->booking->id, 5, '0', STR_PAD_LEFT);
        return new Envelope(
            subject: '🏨 New Booking Request #' . $ref . ' — ' . $this->booking->guest_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking.new-alert',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
