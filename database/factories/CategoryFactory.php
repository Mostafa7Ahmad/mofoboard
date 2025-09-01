<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->words(2, true); // عنوان من كلمتين

        return [
            'user_id' => User::factory(), // بيربط بكاتب (ممكن تغيّر لو مش محتاج)
            'image' => fake()->imageUrl(640, 480, 'categories', true), // صورة عشوائية
            'slug' => Str::slug($title), 
            'title' => $title,
            'description' => fake()->paragraph(),
            'meta_description' => fake()->sentence(12),
        ];
    }
}
