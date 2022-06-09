<?php

namespace Database\Factories;

use App\Models\locker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->unique()->regexify('8869\d{8}'),
            'mail' => $this->faker->unique()->safeEmail(),
            'cardId' => $this->faker->unique()->regexify('\d{16}'),
            'password' => Hash::make("0000"), // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
