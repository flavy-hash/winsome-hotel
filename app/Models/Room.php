<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = [
        'name',
        'tag',
        'description',
        'price_per_night',
        'price_per_night_tzs',
        'size_sqm',
        'bed_type',
        'max_guests',
        'features',
        'image_path',
        'gallery',
        'is_available',
    ];

    protected $casts = [
        'features' => 'array',
        'gallery'  => 'array',
        'price_per_night' => 'decimal:2',
        'price_per_night_tzs' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image_path) {
            return null;
        }
        return asset('storage/' . $this->image_path);
    }
}
