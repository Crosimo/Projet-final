<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->format('Y-m-d'),   
            ],
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(1)->format('Y-m-d'),
            ],
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(2)->format('Y-m-d'),
            ],
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
            ],
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
            ],
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
            ],
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
            ],
            [
            "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
            ],
            [
                "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
                ],
                [
                "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
                ],
                [
                    "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
                    ],
                    [
                    "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
                    ],
                    [
                        "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
                        ],
                        [
                        "dateDébut"=>Carbon::now()->startOfWeek()->addWeek(3)->format('Y-m-d'),
                        ],
        ]);
    }
}
