<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Locker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create()->each(function ($u) {
            locker::insert([]);
            $locker = locker::where('UserId', '=', NULL)->where('lockerNo', '<>', NULL)->inRandomOrder()->first();
            if ($locker != NULL) {
                $locker->update(['UserId' => $u->id]);
            }
        });
    }
}
