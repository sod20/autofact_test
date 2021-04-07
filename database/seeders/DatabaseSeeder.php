<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mr Test',
            'email' => 'mrtest1@gmail.com',
            'password' => Hash::make('password11'),
            'api_token' => '606e12b683121-20148129',
            'role' => 'admin'
        ]);
        for($u = 0 ; $u < 30 ; $u++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password55'),
                'api_token' => uniqid() . '-' . rand(10000000, 99999999), 
            ]);
        }
        for($q = 0 ; $q < 60 ; $q++) {
            DB::table('quizzes')->insert([
                'user_id' => random_int(2, 31),
                'note' => Str::random(40),
                'page_load_speed' => random_int(1, 5),
                'page_reliability' => random_int(1,3),
            ]);
        }
    }
}
