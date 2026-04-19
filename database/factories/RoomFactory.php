<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Nomor kamar unik
            'room_number' => $this->faker->unique()->numberBetween(101, 999),
            // Tipe kamar acak
            'room_type' => $this->faker->randomElement(['Standard', 'Deluxe', 'Suite']),
            // Harga per malam acak antara 50 dan 500
            'price_per_night' => $this->faker->randomElement([500000, 750000, 1000000, 1500000]),
            // Deskripsi kamar acak
            'description' => $this->faker->sentence(10),
            // Status kamar acak
            'status' => $this->faker->randomElement(['available', 'available', 'available', 'booked', 'maintenance']),
        ];
    }
}
