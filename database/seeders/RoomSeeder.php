<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::firstOrCreate(
            ['name' => 'Room 121'],
            [
                'tag'                 => 'Standard',
                'bed_type'            => 'Queen',
                'max_guests'          => 2,
                'size_sqm'            => '16 sqm',
                'price_per_night'     => 40.00,
                'price_per_night_tzs' => 90000.00,
                'description'         => 'The room features a spacious queen-size bed with soft premium bedding, air conditioning, free Wi-Fi, and a flat-screen smart TV for your entertainment. Guests can enjoy a private modern bathroom equipped with hot and cold shower, fresh towels and complementary towel on request. Has a comfortable chair and table for those who have some work to do.',
                'features'            => ['WiFi', 'AC', 'TV', 'City View', 'Garden View'],
                'is_available'        => true,
            ]
        );

        $deluxeRooms = ['Room 214', 'Room 221', 'Room 222', 'Room 223', 'Room 224'];

        foreach ($deluxeRooms as $name) {
            Room::firstOrCreate(
                ['name' => $name],
                [
                    'tag'                 => 'Deluxe',
                    'bed_type'            => 'Double',
                    'max_guests'          => 2,
                    'size_sqm'            => '28 sqm',
                    'price_per_night'     => 60.00,
                    'price_per_night_tzs' => 150000.00,
                    'description'         => 'The room features a spacious double bed with soft premium bedding, air conditioning, free Wi-Fi, and a flat-screen smart TV for your entertainment. Guests can enjoy a private modern bathroom equipped with hot and cold shower, fresh towels and complementary towel on request. Has a comfortable chair and table for those who have some work to do.',
                    'features'            => ['WiFi', 'AC', 'TV', 'Balcony', 'City View', 'Garden View'],
                    'is_available'        => true,
                ]
            );
        }
    }
}
