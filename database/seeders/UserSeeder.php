<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([

            [
                'first_name' => 'admin',
                'last_name' => 'name',
                'username' => 'admin',
                'phone' => '123456789',
                'address' => 'Dhaka, Bangladesh',
                'avatar'=>'backend_image/avatar/00eBEjQAwTXPWS6QAZ3W.png',
                'email' => 'admin@example.com',
                'password' => Hash::make('123456789'),
                'account_type' => 'admin',
                'status' => '1',
                'isMain' => '1',

            ],

            [
                'first_name' => 'user',
                'last_name' => 'name',
                'username' => 'username',
                'phone' => '123456789',
                'address' => 'Dhaka, Bangladesh',
                'avatar'=>'frontend_image/avatar/CHcGBcFhZnFdqVUCjQKW.png',
                'email' => 'user@example.com',
                'password' => Hash::make('123456789'),
                'account_type' => 'user',
                'status' => '1',
                'isMain' => '0',

            ]
            
        ]);
    }
}
