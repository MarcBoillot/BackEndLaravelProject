<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_status' => rand(0, 7),
            'order_price' => fake() -> randomFloat(2, 0, 1000000),
            'order_date' => fake()->dateTime(),
            'delivery_address' => fake()->streetAddress(),
            'facturation_address' => fake()->streetAddress(),
        ];
    }
}
