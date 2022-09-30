<?php

namespace Database\Factories;
use App\Models\City;
use App\Models\Expert;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'city_id' => City::first() ?: City::factory(),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
