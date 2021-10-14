<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Gallery::factory(6)->create();
        \App\Models\Trainer::factory(3)->create();
        \App\Models\Classe::factory(3)->create();
        \App\Models\Slider::factory(2)->create();

        $this->call([
            AboutSeeder::class, EventSeeder::class, FooterSeeder::class,
            HeaderSeeder::class, PricingSeeder::class, RoleSeeder::class,
            ScheduleSeeder::class, TitreSeeder::class, TagSeeder::class
            
        ]);
        DB::table('users')->insert([
            "name" => "Jean",
            "email" => "jean.deborsu@hotmail.com",
            "password" => Hash::make('testtest'),
            "role_id" => 1,
            "created_at" => now()
        ]);
        \App\Models\User::factory(1)->create();
        \App\Models\classe_tag::factory(4)->create();
    }
}
