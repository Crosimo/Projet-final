<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Pricing;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClasseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        static $x =0;
        $x++;
        return [
            "nom"=>"yoga for climbers",
            "lestags"=>"Sathi Bhuiyan".$x,
            "heure"=>"10.00Am-05:00Pm",
            "image"=>$x.".jpg",
            "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
            "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
            "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
        ];
        
    }
}
