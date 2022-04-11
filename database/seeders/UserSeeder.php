<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\user;
use \App\Models\locker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::factory(10)->create()->each(function ($u) {
            if(locker::where('userId','=',NULL)->first()!=NULL){
                locker::where('userId','=',NULL)->inRandomOrder()->first()->update(['userId' => $u->id]);
            }
        });
    }
}
