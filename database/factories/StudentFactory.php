<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assist>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'dni' => fake()->randomNumber(8, true),
                'name' => fake()->name(),
                'lastname' => fake()->lastname(),
                'birthdate' => fake()->dateTime(),
                'grade' => fake()->randomElement(['1ro','2do','3ro']),
        ];
    }
}