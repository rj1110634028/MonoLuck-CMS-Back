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

        user::factory(20)->create()->each(function ($u) {
            locker::insert([]);
            $locker = locker::where('userId', '=', NULL)->where('lockerNo', '<>', NULL)->inRandomOrder()->first();
            if ($locker != NULL) {
                $locker->update(['userId' => $u->id]);
            }
        });
        locker::insert([
            'permission' => 1,
            'email' => 'pi',
            'name' => 'pi',
            'password' => Hash::make('hP4VspmxA6YtIltVtzXioPY3xixgrvxLTMpvkkefWpRjmgpRMdGZ1FtoWWNx'),
        ]);
    }
}
