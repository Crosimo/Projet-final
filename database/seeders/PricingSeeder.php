<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pricings')->insert([
            ["packageTitle"=>"silver package",
            "packagePrice"=>"$30",
            "packageLink1"=>"Free T-Shirt & swags",
            "packageLink2"=>"Free of all message treatments",
            "packageLink3"=>"Access Clup Facilites",
            "packageLink4"=>"Out Door activites",
            "button"=>"get started"],
            ["packageTitle"=>"gold package",
            "packagePrice"=>"$50",
            "packageLink1"=>"Free T-Shirt & swags",
            "packageLink2"=>"Free of all message treatments",
            "packageLink3"=>"Access Clup Facilites",
            "packageLink4"=>"Out Door activites",
            "button"=>"get started"],
            ["packageTitle"=>"platinum package",
            "packagePrice"=>"$70",
            "packageLink1"=>"Free T-Shirt & swags",
            "packageLink2"=>"Free of all message treatments",
            "packageLink3"=>"Access Clup Facilites",
            "packageLink4"=>"Out Door activites",
            "button"=>"get started"]
        ]);
    }
}
