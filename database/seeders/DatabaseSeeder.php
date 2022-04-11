<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\user;
use \App\Models\locker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        locker::factory(34)->create();
        user::factory(10)->create()->each(function ($u) {
            locker::where('userId','=',NULL)->inRandomOrder()->first()->update(['userId' => $u->id]);
        });
    }
}
