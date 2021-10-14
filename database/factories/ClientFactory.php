<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "logo"=>"zmdi zmdi-quote",
            "description"=>$this->faker->sentence(),
            "titre"=>"Co-Founder Of Company",
            "image"=>"img/icon/signature.png"
        ];
    }
}
