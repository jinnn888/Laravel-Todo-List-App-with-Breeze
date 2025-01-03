<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            'user_id' => \App\Models\User::first()->id,
            'status' => $this->faker->randomElement(['pending', 'in-progress', 'completed', 'on-hold', 'canceled']), 
        ];
    }
}
