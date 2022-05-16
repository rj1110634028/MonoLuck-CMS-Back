<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\user;
use \App\Models\locker;
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

        // user::factory(20)->create()->each(function ($u) {
        //     locker::insert([]);
        //     $locker = locker::where('userId', '=', NULL)->where('lockerNo', '<>', NULL)->inRandomOrder()->first();
        //     if ($locker != NULL) {
        //         $locker->update(['userId' => $u->id]);
        //     }
        // });
        
        //create test RootUser
        user::create([
            'permission' => 0,
            'email' => '000@example.com',
            'name' => 'root',
            'password' => Hash::make('root'),
        ]);
        user::create([
            'permission' => 0,
            'email' => '002@example.com',
            'name' => 'root2',
            'password' => Hash::make('root'),
        ]);
        user::create([
            'permission' => 0,
            'email' => '003@example.com',
            'name' => 'root3',
            'password' => Hash::make('root'),
        ]);
    }
}
