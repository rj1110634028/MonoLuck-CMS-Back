<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use \App\Models\Locker;

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
        Locker::create(
            [
                'lockerNo' => "00",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "01",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => "02",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "03",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "04",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => NULL,
                'lockerEncoding' => NULL,
            ]
        );
        Locker::create(
            [
                'lockerNo' => "05",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "06",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "07",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "08",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "09",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "10",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "11",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "12",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "13",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "14",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "15",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "16",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "17",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "18",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "19",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "20",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "21",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "22",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "23",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "24",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "25",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "26",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "27",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "28",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "29",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "30",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "31",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "32",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ]
        );
        Locker::create(
            [
                'lockerNo' => "33",
                'lockerEncoding' => $faker->unique()->regexify('0[3-8]0[1-9]'),
            ],
        );
    }
}
