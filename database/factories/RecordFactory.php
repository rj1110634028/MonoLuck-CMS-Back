<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\user;
use \App\Models\locker;
use phpDocumentor\Reflection\Types\Null_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user=user::inRandomOrder()->first();
        $description=NULL;
        if($user->permission==0){
            $description=$this->faker->text();
        }
        return [
            'description'=>$description,
            'lockerId'=>locker::inRandomOrder()->first()->id,
            'userId'=>$user->id,
        ];
    }
}
