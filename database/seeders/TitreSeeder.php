<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titres')->insert([
            ["titre0"=>"Welcome Our Handstand",
            "description0"=>"Keep <span>Refresh & Strong</span> Your Body",

            "titre1"=>"about our handstand",
            "description1"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, lorem ipsum is.",

            "titre2"=>"our classes",
            "description2"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem ",
            
           "titre3"=>"class schedule",
            "description3"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem ",
            
            "titre4"=>"our trainer",
            "description4"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem",

            "titre5"=>"our gallery",
            "description5"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem",
            
            "titre6"=>"awesome event",
            "description6"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem",

            "titre7"=>"pricing table",
            "description7"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem",

            "titre8"=>"gift our<span class=span>client</span> say",
            "description8"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem",

            ]
            
        ]);
    }
}
