<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class AdmenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user= user::create([
        "full_name" => "haifa Alfitory",
        "email" => "Haifa@gmail.com",
        "password" =>  Hash::make(12345678910),
        "phone_number" => "0920881272",
       // "Profile_img",
       // "Profile_description"

        ]);

        UserRole::create([
        
            "role_id" =>1,
            "user_id" =>$user->id,

        ]);

    }
}
