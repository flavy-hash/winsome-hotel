<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Models\Review;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $rooms        = Room::where('is_available', true)->take(3)->get();
    $homeReviews  = Review::approved()->with('room')->latest()->take(3)->get();
    $avgHomeRating    = Review::approved()->avg('rating');
    $totalReviewCount = Review::approved()->count();
    return view('welcome', compact('rooms', 'homeReviews', 'avgHomeRating', 'totalReviewCount'));
});

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'storeGeneral'])->name('reviews.store');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
Route::get('/rooms/{room}/availability', [RoomController::class, 'availability'])->name('rooms.availability');
Route::post('/rooms/{room}/reviews', [ReviewController::class, 'store'])->name('rooms.reviews.store');

Route::get('/location', fn() => view('location'))->name('location');

Route::get('/sitemap.xml', function () {
    $rooms = Room::where('is_available', true)->get();
    $content = view('sitemap', compact('rooms'))->render();
    return response($content, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/confirmation/{booking}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
Route::get('/rooms/{room}/booked-dates', [BookingController::class, 'bookedDates'])->name('rooms.booked-dates');
