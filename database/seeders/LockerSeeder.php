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
        $lockerList = [
            [
                'lockerNo' => "00",
            ],
            [
                'lockerNo' => "01",
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => "02",
            ],
            [
                'lockerNo' => "03",
            ],
            [
                'lockerNo' => "04",
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => NULL,
            ],
            [
                'lockerNo' => "05",
            ],
            [
                'lockerNo' => "06",
            ],
            [
                'lockerNo' => "07",
            ],
            [
                'lockerNo' => "08",
            ],
            [
                'lockerNo' => "09",
            ],
            [
                'lockerNo' => "10",
            ],
            [
                'lockerNo' => "11",
            ],
            [
                'lockerNo' => "12",
            ],
            [
                'lockerNo' => "13",
            ],
            [
                'lockerNo' => "14",
            ],
            [
                'lockerNo' => "15",
            ],
            [
                'lockerNo' => "16",
            ],
            [
                'lockerNo' => "17",
            ],
            [
                'lockerNo' => "18",
            ],
            [
                'lockerNo' => "19",
            ],
            [
                'lockerNo' => "20",
            ],
            [
                'lockerNo' => "21",
            ],
            [
                'lockerNo' => "22",
            ],
            [
                'lockerNo' => "23",
            ],
            [
                'lockerNo' => "24",
            ],
            [
                'lockerNo' => "25",
            ],
            [
                'lockerNo' => "26",
            ],
            [
                'lockerNo' => "27",
            ],
            [
                'lockerNo' => "28",
            ],
            [
                'lockerNo' => "29",
            ],
            [
                'lockerNo' => "30",
            ],
            [
                'lockerNo' => "31",
            ],
            [
                'lockerNo' => "32",
            ],
            [
                'lockerNo' => "33",
            ],
        ];
        foreach ($lockerList as $value) {
            if ($value['lockerNo'] != NULL) {
                $value['lockerEncoding'] = $faker->unique()->regexify('[0-9]{4}');
            } else {
                $value['lockerEncoding'] = NULL;
            }
            Locker::create(
                $value
            );
        }
    }
}
