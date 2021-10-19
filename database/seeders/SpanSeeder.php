<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spans')->insert([
            ["position1"=>"",
            "position2"=>"",
            "position3"=>"",],
            ["position1"=>"",
            "position2"=>"",
            "position3"=>"",],
            ["position1"=>"span",
            "position2"=>"",
            "position3"=>"",],
            ["position1"=>"",
            "position2"=>"span",
            "position3"=>"",],
            ["position1"=>"",
            "position2"=>"",
            "position3"=>"span",],
        ]);
    }
}
