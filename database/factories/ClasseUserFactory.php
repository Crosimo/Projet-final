<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Classe_user;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClasseUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classe_user::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'classe_id'=>$this->faker->numberBetween(1, count(Classe::all())),
            'user_id'=>$this->faker->numberBetween(1, count(User::all())),
        ];
    }
}
