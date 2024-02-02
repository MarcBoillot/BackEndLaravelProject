<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crafter>
 */
class CrafterFactory extends Factory
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
            'information' => fake()->text(),
            'story' => fake()->text(),
            'crafting_process' => fake()->text(),
            'location' => fake()->streetAddress(),
            'material_preference' => fake()->name(),
        ];
    }
}
