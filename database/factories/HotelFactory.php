<?php

namespace Database\Factories;

use App\Enums\HotelStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'subdomain' => $this->faker->slug(),
            'description' => $this->faker->sentence(7),
            'location' => $this->faker->address(),
            'contact_email' => $this->faker->email(),
            'contact_phone' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement(HotelStatus::all()),
        ];
    }
}
