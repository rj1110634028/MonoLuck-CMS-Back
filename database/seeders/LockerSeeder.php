<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
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
        $faker = Faker::create();
        locker::insert([
            [
                'lockerNo' => "00",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "01",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => "02",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "03",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "04",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => NULL,
                'lockerEncoding' =>NULL,
            ],
            [
                'lockerNo' => "05",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "06",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "07",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "08",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "09",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "10",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "11",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "12",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "13",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "14",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "15",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "16",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "17",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "18",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "19",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "20",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "21",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "22",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "23",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "24",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "25",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "26",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "27",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "28",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "29",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "30",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "31",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "32",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
            [
                'lockerNo' => "33",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
        ]);
    }
}
