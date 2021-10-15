<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert([
            "image"=>"logo1.png",
            "description"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a convallis nulla. Ut",
            "email"=>"username@gmail.com",
            "logoEmail"=>"zmdi zmdi-email",
            "tel"=>"+660 256 24857",
            "logoTel"=>"zmdi zmdi-email",
            "adresse"=>"Molenbeek la zone",
            "logoAdresse"=>"zmdi zmdi-email",
            "tweets"=>"Recent Tweets",
            "tweetIcon"=>"zmdi zmdi-twitter",
            "tweetcontenu1"=>"@envato good News for today!! We got  2 psd templete weekly top selling quality template in technology category !!!",
            "tweetcontenu2"=>"@envato good News for today!! We got  2 psd templete weekly top selling quality template in technology category !!!",
            "getintouch"=>"getintouch",
            "formElem1"=>"name",
            "formElem2"=>"name",
            "formElem3"=>"name",
            "copyright"=>"Copyright",
            "copyrightAnnée"=>"JeanisLife",
            "copyrightEntreprise"=>"2017, all rights reserved."
        ]);
    }
}
