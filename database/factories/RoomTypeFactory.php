<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomType>
 */
class RoomTypeFactory extends Factory
{
    public function definition(): array
    {
        return [

            'room_name' => fake()->randomElement([
                'Standard Room',
                'Deluxe Room',
                'Executive Room',
                'Suite',
                'Presidential Suite'
            ]),

            'description' => fake()->sentence(),

            'price' => fake()->numberBetween(1500,10000),

            'max_occupancy' => fake()->numberBetween(1,6),

            'image' => null,

        ];
    }
}
