<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Pricing;
use App\Models\Trainer;
use Carbon\Carbon;
use Facade\Ignition\Support\FakeComposer;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
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
        
        
        \App\Models\Slider::factory(2)->create();
        \App\Models\Client::factory(4)->create();
       
        $this->call([
            AboutSeeder::class, EventSeeder::class, FooterSeeder::class,
            HeaderSeeder::class, PricingSeeder::class, RoleSeeder::class, 
            ScheduleSeeder::class, TitreSeeder::class, 
            TagSeeder::class, CategorieSeeder::class,TrainerSeeder::class
           
        ]);
        
        DB::table('users')->insert([
            ["name" => "Jean",
            "email" => "jean.deborsu@hotmail.com",
            "password" => Hash::make('testtest'),
            "role_id" => 1,
            "pricing_id"=>1,
            "image" => "blog1.jpg",
            "created_at" => now()],
            ["name" => "Roch",
            "email" => "roch.deborsu@hotmail.com",
            "pricing_id"=>1,
            "password" => Hash::make('testtest'),
            "role_id" => 3,
            "image" => "blog2.jpg",
            "created_at" => now()],
            ["name" => "Pol",
            "email" => "pol.deborsu@hotmail.com",
            "pricing_id"=>1,
            "password" => Hash::make('testtest'),
            "role_id" => 2,
            "image" => "blog3.jpg",
            "created_at" => now()],
            ["name" => "Papa",
            "email" => "papa.deborsu@hotmail.com",
            "pricing_id"=>1,
            "password" => Hash::make('testtest'),
            "role_id" => 4,
            "image" => "blog4.jpg",
            "created_at" => now()],
        ]);
        
        // \App\Models\Trainer::factory(5)->create();
        $this->faker = Faker::create();
        DB::table('classes')->insert([
            [
                "nom"=>"alright",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-06 08'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-06 08'),
                "image"=>"1.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"okay",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-06 12'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-06 12'),
                "image"=>"2.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"aggro",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-08 08'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-08 08'),
                "image"=>"3.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"akimbo",
                "lestags"=>"Sathi Bhuiyan1",
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-10 15'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-10 15'),
                "image"=>"4.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],[
                "nom"=>"alright",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-09 12'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-09 12'),
                "image"=>"5.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"okay",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-09 18'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-09 18'),
                "image"=>"6.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"aggro",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-10 18'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-10 18'),
                "image"=>"7.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"akimbo",
                "lestags"=>"Sathi Bhuiyan1",
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-12 18'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-12 18'),
                "image"=>"8.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],[
                "nom"=>"alright",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-13 18'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-13 18'),
                "image"=>"9.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"okay",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-14 15'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-14 15'),
                "image"=>"10.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"aggro",
                "lestags"=>"Sathi Bhuiyan1",
                
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-11 18'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-11 18'),
                "image"=>"11.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
            [
                "nom"=>"akimbo",
                "lestags"=>"Sathi Bhuiyan1",
                // "date"=>"2021-11-".$y,
                "heureDébut"=>Carbon::createFromFormat('Y-m-d H','2021-11-17 15'),
                "heureFin"=>Carbon::createFromFormat('Y-m-d H','2021-11-17 15'),
                "image"=>"12.jpg",
                "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
                "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
                "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
                "places"=>$this->faker->numberBetween(0, 5),
                // "participants"=> '[]',
                "prioritaire"=>false,
                
            ],
        ]);

        
        // \App\Models\Classe::factory(9)->create();
        // \App\Models\User::factory(100)->create();
        \App\Models\classe_tag::factory(4)->create();
        DB::table('trainer_users')->insert([
           
            ['trainer_id'=>2,
                'user_id'=> 2],
            ['trainer_id'=>1,
                'user_id'=> 3],
            ['trainer_id'=>3,
            'user_id'=> 1],
                
        ]);
    }
}
