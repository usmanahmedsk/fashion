<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        DB::table('users')->insert([
            "first_name" => "Usman",
            "last_name" => "Test",
            "email" => "usman@test.com",
            "password" => Hash::make('1234'),
            "user_type_id" => 1,
            "token" => "48645634HJFHJDFGHDGHF",
        ]);
    }
}
