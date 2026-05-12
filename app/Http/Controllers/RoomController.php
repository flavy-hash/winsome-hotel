<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::where('is_available', true)->get();
        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        abort_unless($room->is_available, 404);

        $otherRooms = Room::where('is_available', true)
            ->where('id', '!=', $room->id)
            ->take(3)
            ->get();

        $reviews = Review::where('room_id', $room->id)
            ->approved()
            ->latest()
            ->get();

        $avgRating = $reviews->avg('rating');

        return view('rooms.show', compact('room', 'otherRooms', 'reviews', 'avgRating'));
    }
}
