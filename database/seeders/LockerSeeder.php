<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\locker;

class LockerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        locker::insert([
            [
                
                'title' => sprintf("%02d", $this->faker->unique()->numberBetween(0, 33)),
                'lockerEncoding' => $this->faker->unique()->regexify('[0-9]{4}'),
            ],
        ]);
    }
}
