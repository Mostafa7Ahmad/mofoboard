<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'avatar' => fake()->imageUrl(200, 200, 'people', true, 'avatar'), 
            'phone' => fake()->unique()->phoneNumber(),
            'bio' => fake()->paragraph(),
            'blocked' => 0,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'last_activity' => fake()->dateTimeBetween('-1 month', 'now'),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the user’s email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
