<?php

use App\User;
use App\Model\UserInfo;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $users = User::all();
        $count = $users->count();
        foreach($users as $user) { 
            $newUserInfo = new UserInfo();
            $newUserInfo->phone = $faker->phoneNumber();
            $newUserInfo->address = $faker->address();
            $newUserInfo->user_id = $user->id;
            
            $newUserInfo->save();
        }
    }
}

