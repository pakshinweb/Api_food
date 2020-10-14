<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,

        ]);

        DB::table('users')->insert([
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),

        ]);

    }
}
