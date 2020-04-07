<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category'=>'bransoletki',
        ]);
        DB::table('categories')->insert([
            'category'=>'broszki',
        ]);
        DB::table('categories')->insert([
            'category'=>'kolczyki',
        ]);
        DB::table('categories')->insert([
            'category'=>'naszyjniki',
        ]);
        DB::table('categories')->insert([
            'category'=>'ozdoby do włosów',
        ]);
        DB::table('categories')->insert([
            'category'=>'pierścionki',
        ]);
        DB::table('categories')->insert([
            'category'=>'zawieszki',
        ]);
        DB::table('categories')->insert([
            'category'=>'inne',
        ]);
    }
}
