<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainers')->insert([
        ["image"=>"trainer1.jpg",
        "nom"=>"Pol",
        "facebook"=>"fa fa-facebook",
        "facebookLien"=>"https://www.facebook.com/",
        "twitter"=>"fa fa-twitter",
        "twitterLien"=>"https://www.twitter.com/",
        "instagram"=>"fa fa-instagram",
        "instagramLien"=>"https://www.instagram.com/",
        "pinterest"=>"fa fa-pinterest",
        "pinterestLien"=>"https://www.pinterest.com/",
        'role_id' => 2],
        ["image"=>"trainer2.jpg",
        "nom"=>"roch",
        "facebook"=>"fa fa-facebook",
        "facebookLien"=>"https://www.facebook.com/",
        "twitter"=>"fa fa-twitter",
        "twitterLien"=>"https://www.twitter.com/",
        "instagram"=>"fa fa-instagram",
        "instagramLien"=>"https://www.instagram.com/",
        "pinterest"=>"fa fa-pinterest",
        "pinterestLien"=>"https://www.pinterest.com/",
        'role_id' => 3],
        ["image"=>"trainer3.jpg",
        "nom"=>"Ms. Dorothy",
        "facebook"=>"fa fa-facebook",
        "facebookLien"=>"https://www.facebook.com/",
        "twitter"=>"fa fa-twitter",
        "twitterLien"=>"https://www.twitter.com/",
        "instagram"=>"fa fa-instagram",
        "instagramLien"=>"https://www.instagram.com/",
        "pinterest"=>"fa fa-pinterest",
        "pinterestLien"=>"https://www.pinterest.com/",
        'role_id' => 3],]);
    }
}
