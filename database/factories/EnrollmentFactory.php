<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()
            // ->state(['role' => 'student'])
            ,
            'course_id' => Course::factory(),
            'progress' => fake()->numberBetween(0, 100),
            'status' => fake()->randomElement(['active', 'completed', 'canceled']),
        ];
    }
}
