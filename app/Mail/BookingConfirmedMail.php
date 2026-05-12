<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your reservation is confirmed — Winsome Hotel · Ref #' . str_pad($this->booking->id, 5, '0', STR_PAD_LEFT),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking.confirmed',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
