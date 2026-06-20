<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Mail\NewBookingAlertMail;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id'    => 'nullable|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'check_in'   => 'required|date|after_or_equal:today',
            'check_out'  => 'required|date|after:check_in',
            'guests'     => 'required|integer|min:1|max:20',
            'children'   => 'nullable|integer|min:0|max:20',
            'notes'      => 'nullable|string|max:1000',
        ]);

        $validated['children'] = $validated['children'] ?? 0;

        // Prevent double-booking: check for overlapping confirmed/pending bookings
        if (!empty($validated['room_id'])) {
            $conflict = Booking::where('room_id', $validated['room_id'])
                ->whereIn('status', ['pending', 'confirmed'])
                ->where('check_in', '<', $validated['check_out'])
                ->where('check_out', '>', $validated['check_in'])
                ->first();

            if ($conflict) {
                return redirect()
                    ->route('rooms.availability', $validated['room_id'])
                    ->with('conflict_from', $conflict->check_in->format('M d, Y'))
                    ->with('conflict_to',   $conflict->check_out->format('M d, Y'))
                    ->with('tried_in',  $validated['check_in'])
                    ->with('tried_out', $validated['check_out']);
            }
        }

        $nights = (int) \Carbon\Carbon::parse($validated['check_in'])
            ->diffInDays(\Carbon\Carbon::parse($validated['check_out']));

        $room = $validated['room_id'] ? Room::find($validated['room_id']) : null;
        $validated['total_price'] = $room ? $room->price_per_night * $nights : null;
        $validated['status'] = 'pending';

        $booking = Booking::create($validated);
        $booking->load('room');

        // Email to guest
        Mail::to($booking->email)->send(new BookingConfirmationMail($booking));

        // Alert email to hotel staff
        $hotelEmail = config('hotel.booking_email') ?: config('mail.from.address');
        Mail::to($hotelEmail)->send(new NewBookingAlertMail($booking));

        return redirect()->route('booking.confirmation', $booking)
            ->with('success', 'Your booking request has been received!');
    }

    public function confirmation(Booking $booking)
    {
        return view('booking.confirmation', compact('booking'));
    }

    public function bookedDates(Room $room): JsonResponse
    {
        $bookings = Booking::where('room_id', $room->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('check_out', '>=', now()->toDateString())
            ->get(['check_in', 'check_out'])
            ->map(fn ($b) => [
                'from' => $b->check_in->toDateString(),
                'to'   => $b->check_out->toDateString(),
            ]);

        return response()->json($bookings);
    }
}
