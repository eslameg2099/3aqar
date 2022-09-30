<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
            'user_id' => Customer::first() ?: Customer::factory(),
            'city_id' => City::first() ?: City::factory(),
            'type_id' => Type::first() ?: Type::factory(),
            'type' => $this->faker->randomElement([
                Type::RENT_TYPE,
                Type::SELLING_TYPE,
            ]),
            'space_from' => 50,
            'space_to' => 200,
            'price_from' => 20000,
            'price_to' => 200000,
            'published_at' => now(),
        ];
    }
}
