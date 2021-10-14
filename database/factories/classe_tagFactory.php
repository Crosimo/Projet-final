<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\classe_tag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class classe_tagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = classe_tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'classe_id'=>$this->faker->numberBetween(1, count(Classe::all())),
            'tag_id'=>$this->faker->numberBetween(1, count(Tag::all())),
        ];
    }
}
