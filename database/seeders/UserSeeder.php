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
        user::factory(20)->create()->each(function ($u) {
            $locker=locker::where('userId','=',NULL)->inRandomOrder()->first();
            if($locker!=NULL){
                $locker->update(['userId' => $u->id]);
            }
        });
    }
}
