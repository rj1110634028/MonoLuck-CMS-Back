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
        User::create([
            'permission' => 0,
            'mail' => '000@example.com',
            'name' => 'root',
            'password' => Hash::make('root'),
        ]);
        User::create([
            'permission' => 0,
            'mail' => '002@example.com',
            'name' => 'root2',
            'password' => Hash::make('root'),
        ]);
        User::create([
            'permission' => 0,
            'mail' => '003@example.com',
            'name' => 'root3',
            'password' => Hash::make('root'),
        ]);
    }
}
