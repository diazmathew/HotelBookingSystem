<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoomType::create([
            'room_name' => 'Standard Room',
            'description' => 'Comfortable room ideal for solo travelers or couples.',
            'price' => 1500.00,
            'max_occupancy' => 2,
            'image' => null,
        ]);

        RoomType::create([
            'room_name' => 'Deluxe Room',
            'description' => 'Spacious room with upgraded amenities for a relaxing stay.',
            'price' => 3000.00,
            'max_occupancy' => 3,
            'image' => null,
        ]);

        RoomType::create([
            'room_name' => 'Executive Room',
            'description' => 'Perfect for business travelers who need extra comfort.',
            'price' => 5000.00,
            'max_occupancy' => 4,
            'image' => null,
        ]);

        RoomType::create([
            'room_name' => 'Suite',
            'description' => 'Premium suite with separate living area and top-tier service.',
            'price' => 8000.00,
            'max_occupancy' => 6,
            'image' => null,
        ]);
    }
}
