<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews        = Review::approved()->with('room')->latest()->paginate(12);
        $avgRating      = Review::approved()->avg('rating');
        $avgService     = Review::approved()->whereNotNull('service_rating')->avg('service_rating');
        $avgCleanliness = Review::approved()->whereNotNull('cleanliness_rating')->avg('cleanliness_rating');
        $totalCount     = Review::approved()->count();
        $rooms          = Room::where('is_available', true)->get();
        return view('reviews.index', compact(
            'reviews', 'avgRating', 'avgService', 'avgCleanliness', 'totalCount', 'rooms'
        ));
    }

    // POST /reviews — from the standalone reviews page (no specific room)
    public function storeGeneral(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'room_id'    => 'nullable|exists:rooms,id',
            'rating'     => 'required|integer|min:1|max:5',
            'title'      => 'nullable|string|max:160',
            'body'       => 'required|string|min:10|max:2000',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('reviews', 'public');
        }

        $validated['status'] = 'pending';
        unset($validated['photo']);

        Review::create($validated);

        return redirect()->route('reviews.index')
            ->with('review_submitted', true);
    }

    // POST /rooms/{room}/reviews — from the room detail page
    public function store(Request $request, Room $room)
    {
        $validated = $request->validate([
            'guest_name'          => 'required|string|max:255',
            'email'               => 'required|email|max:255',
            'rating'              => 'required|integer|min:1|max:5',
            'service_rating'      => 'nullable|integer|min:1|max:5',
            'cleanliness_rating'  => 'nullable|integer|min:1|max:5',
            'title'               => 'nullable|string|max:160',
            'body'                => 'required|string|min:10|max:2000',
            'photo'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('reviews', 'public');
        }

        $validated['room_id'] = $room->id;
        $validated['status']  = 'pending';
        unset($validated['photo']);

        Review::create($validated);

        return redirect()
            ->route('rooms.show', $room)
            ->with('review_submitted', true);
    }
}
