<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            'name' => 'Apple',
            'glycaemic_index' => 11,
            'category_id' => 1
        ]);
        DB::table('foods')->insert([
            'name' => 'Orange',
            'glycaemic_index' => 22,
            'category_id' => 2
        ]);
        DB::table('foods')->insert([
            'name' => 'curd',
            'glycaemic_index' => 33,
            'category_id' => 3
        ]);
        DB::table('foods')->insert([
            'name' => 'cheese',
            'glycaemic_index' => 35,
            'category_id' => 4
        ]);
    }
}
