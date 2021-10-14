<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            "content" =>"but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and is more recently with desktop publishing software like Aldus PageMaker including versions. ",
            "image"=>"about.jpg",
            "vidéo"=>"https://www.youtube.com/watch?v=A47zwWsjXgs",
            "logo"=>"zmdi zmdi-play",
        ]);
    }
}
