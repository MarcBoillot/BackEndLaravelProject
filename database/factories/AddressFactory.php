<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'address_name' => fake()->name(),
            'address_type' => rand(0, 1),
            'address_firstname' => fake()->streetName(),
            'address_lastname' => fake()->streetName(),
            'first_address' => fake()->streetAddress(),
            'second_address' => fake()->streetAddress(),
            'postal_code' => fake()->postcode(),
        ];
    }
}
