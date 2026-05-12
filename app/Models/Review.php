<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'room_id',
        'guest_name',
        'email',
        'rating',
        'service_rating',
        'cleanliness_rating',
        'title',
        'body',
        'photo_path',
        'status',
    ];

    protected $casts = [
        'rating'              => 'integer',
        'service_rating'      => 'integer',
        'cleanliness_rating'  => 'integer',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
