<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Pricing;
use App\Models\Trainer;
use Carbon\Carbon;
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
        static $y =8;
        $y+=4;
        return [
            "nom"=>"yoga for climbers",
            "lestags"=>"Sathi Bhuiyan".$x,
            "heureDébut"=>$y,
            "date"=>"2021-11-".$y,
            // "heureFin"=>Carbon::now(),
            "image"=>$x.".jpg",
            "trainer_id"=>$this->faker->numberBetween(1, count(Trainer::all())),
            "categorie_id"=>$this->faker->numberBetween(1, count(Categorie::all())),
            "pricing_id"=>$this->faker->numberBetween(1, count(Pricing::all())),
            "places"=>$this->faker->numberBetween(5, 15),
            // "participants"=> '[]',
            "prioritaire"=>false,
            
        ];
//         $dateString = '25/08/2017';
//         $dateObject = \Carbon::createFromFormat('d/m/Y', $dateString);
        // 'Y-m-d H:i:s'
        // 2017-03-08 00:00:00.000000
        // $startDate = \Carbon\Carbon::createFromFormat('Y-m-d','2019-10-01');
        // $endDate = \Carbon\Carbon::createFromFormat('Y-m-d','2019-10-30');
        // $check = \Carbon\Carbon::now()->between($startDate,$endDate);
        
    }
}
