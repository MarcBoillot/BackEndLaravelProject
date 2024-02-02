<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_price' => fake()-> randomFloat(2, 0, 10000),
            'name' => fake()->unique()->word(),
            'description' => fake()->text(),
            //enum composé de trois elements (waiting, validate, unvalidate)
            'status' => rand(0, 2),
            'color' => fake()->colorName(),
            'customizable' => fake()->boolean(),
            'is_active' => fake()->boolean(),
        ];
    }
}
