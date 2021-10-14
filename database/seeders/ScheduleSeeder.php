<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            "nom"=>"yoga for climbers",
            "instructeur"=>"Sathi Bhuiyan",
            "heure"=>"8.00 Am-10.00Am"
        ]);
    }
}
