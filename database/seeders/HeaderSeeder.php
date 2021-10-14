<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('headers')->insert([
            "image"=>"logo.png",
            "titre1"=>"Home",
            "titre2"=>"About us",
            "titre3"=>"classes",
            "titre4"=>"gallery",
            
            "titre5"=>"Contact",
        ]);
    }
}
