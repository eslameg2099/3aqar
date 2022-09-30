<?php

namespace Database\Factories;
use App\Models\City;

use App\Models\Advisor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvisorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advisor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          
            'city_id' => City::first() ?: City::factory(),
            'price' => rand(500, 1000),

        ];
    }
}
