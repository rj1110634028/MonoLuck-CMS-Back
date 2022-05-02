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
        locker::create(
            [
                'lockerNo' => "00",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "01",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => "02",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "03",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "04",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        locker::create(
            [
                'lockerNo' => "05",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "06",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "07",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "08",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "09",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "10",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "11",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "12",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "13",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "14",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "15",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "16",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "17",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "18",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "19",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "20",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "21",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "22",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "23",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "24",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "25",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "26",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "27",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "28",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "29",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "30",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "31",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "32",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ]
        );
        locker::create(
            [
                'lockerNo' => "33",
                'lockerEncoding' => $faker->unique()->regexify('[0-9]{4}'),
            ],
        );
    }
}
