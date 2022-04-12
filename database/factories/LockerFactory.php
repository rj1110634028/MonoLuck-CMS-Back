<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\locker>
 */
class LockerFactory extends Factory
{
    static $cnt = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lockerNo' => sprintf("%02d", $this->faker->unique()->numberBetween(0, 33)),
            'lockerEncoding' => $this->faker->unique()->regexify('([0-9][1-9]){2}'),
        ];
    }
}
