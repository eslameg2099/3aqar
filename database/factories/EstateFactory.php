<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Estate;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estate::class;

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
            'type' => $this->faker->randomElement([
                Type::RENT_TYPE,
                Type::SELLING_TYPE,
            ]),
            'user_id' => User::first() ?: User::factory(),
            'type_id' => Type::first() ?: Type::factory(),
            'space' => rand(50, 100),
            'price' => rand(500, 1000),
            'city_id' => City::first() ?: City::factory(),
            'video' => 'https://www.youtube.com/watch?v=HmZKgaHa3Fg',
            'user_type' => $this->faker->randomElement([
                Estate::OWNER_USER_TYPE,
                Estate::MARKETER_USER_TYPE,
                Estate::AGENT_USER_TYPE,
            ]),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
