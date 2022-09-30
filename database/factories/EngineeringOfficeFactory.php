<?php

namespace Database\Factories;
use App\Models\City;
use App\Models\EngineeringOffice;
use Illuminate\Database\Eloquent\Factories\Factory;

class EngineeringOfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EngineeringOffice::class;

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
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'city_id' => City::first() ?: City::factory(),
        ];
    }
}
