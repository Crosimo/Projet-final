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
        
        \App\Models\Gallery::factory(8)->create();
        \App\Models\Trainer::factory(3)->create();
        
        \App\Models\Slider::factory(2)->create();
        \App\Models\Client::factory(4)->create();
       
        $this->call([
            AboutSeeder::class, EventSeeder::class, FooterSeeder::class,
            HeaderSeeder::class, PricingSeeder::class, RoleSeeder::class, 
            ScheduleSeeder::class, SpanSeeder::class, TitreSeeder::class, 
            TagSeeder::class, CategorieSeeder::class,
            
        ]);
        
        DB::table('users')->insert([
            "name" => "Jean",
            "email" => "jean.deborsu@hotmail.com",
            "password" => Hash::make('testtest'),
            "role_id" => 1,
            "created_at" => now()
        ]);
        \App\Models\Classe::factory(3)->create();
        \App\Models\User::factory(1)->create();
        \App\Models\classe_tag::factory(4)->create();
    }
}
