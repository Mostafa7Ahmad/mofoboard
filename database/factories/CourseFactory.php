<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(3);
        return [
            'title' => $title,
            "slug" => Str::slug($title),
            'description' => fake()->paragraph(),
            'price' => fake()->randomElement([0, 49, 99, 199, 299]),
            'difficulty_level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
            'duration' => fake()->randomElement(['1h', '3h', '6h', '12h']),
            'category_id' => Category::factory(),
            'instructor_id' => User::factory()
            // ->state(['role' => 'teacher'])
            ,
        ];
    }
}
