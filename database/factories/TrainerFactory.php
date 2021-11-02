<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $x = 0;
        $x++;
        return [
            "image"=>"trainer".$x.".jpg",
            "nom"=>$this->faker->name(),
            "facebook"=>"fa fa-facebook",
            "facebookLien"=>"https://www.facebook.com/",
            "twitter"=>"fa fa-twitter",
            "twitterLien"=>"https://www.twitter.com/",
            "instagram"=>"fa fa-instagram",
            "instagramLien"=>"https://www.instagram.com/",
            "pinterest"=>"fa fa-pinterest",
            "pinterestLien"=>"https://www.pinterest.com/",
            'role_id' => $this->faker->numberBetween(2,3),
        ];
    }
}
