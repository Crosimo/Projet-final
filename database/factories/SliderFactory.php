<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

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
            "description"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor pharetra iss neque. Nullam cursus elit sit amet justo interdum facilisis id at tortor. " ,
            "button"=>"read more",
            "image"=>"slider".$x.".jpg",
            "boolean" => false ,
        ];
    }
}
