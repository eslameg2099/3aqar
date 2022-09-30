<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Office;
use App\Models\OfficeOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Office::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'user_id' => OfficeOwner::first() ?: OfficeOwner::factory(),
            'city_id' => City::first() ?: City::factory(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (OfficeOwner $user) {
            OfficeOwner::withoutEvents(function () use ($user) {
                $user->forceFill([
                    'phone_verified_at' => now(),
                ])->save();
            });
        });
    }
}
