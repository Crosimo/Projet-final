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
            ["position"=>["span", "", ""]],
            ["position"=>["", "span", ""]],
           [ "position"=>["", "", "span"]]
        ]);
    }
}
