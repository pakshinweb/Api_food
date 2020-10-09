<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorysTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert(['name' => 'breakfast',]);
        DB::table('categorys')->insert(['name' => 'lunch',]);
        DB::table('categorys')->insert(['name' => 'dinner',]);
        DB::table('categorys')->insert(['name' => 'snack',]);
    }
}
