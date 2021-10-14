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
            "image"=>"logo.png",
            "description"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a convallis nulla. Ut",
            "email"=>"username@gmail.com",
            "tel"=>"+660 256 24857",
            "adresse"=>"Molebeek la zone",
            "tweets"=>"Recent Tweets",
            "tweetcontenu1"=>"@envato good News for today!! We got  2 psd templete weekly top selling quality template in technology category !!!",
            "tweetcontenu2"=>"@envato good News for today!! We got  2 psd templete weekly top selling quality template in technology category !!!",
            "getintouch"=>"getintouch"

        ]);
    }
}
