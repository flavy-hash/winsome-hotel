<?php

namespace App\Models;

use App\Observers\BookingObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(BookingObserver::class)]
class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'guest_name',
        'email',
        'phone',
        'check_in',
        'check_out',
        'guests',
        'children',
        'total_price',
        'status',
        'notes',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function getNightsAttribute(): int
    {
        return (int) $this->check_in->diffInDays($this->check_out);
    }
}
