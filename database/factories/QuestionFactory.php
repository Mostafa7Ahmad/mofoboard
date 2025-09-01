<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::factory(),
            'text' => fake()->sentence() . '?',
            'type' => fake()->randomElement(['multiple-choice', 'true-false', 'short-answer']),
            'explanation' => fake()->sentence(),
        ];
    }
}
