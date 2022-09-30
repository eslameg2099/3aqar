<?php

namespace Database\Factories;

use App\Models\Archeticture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\CategoryArcheticture;

class ArchetictureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Archeticture::class;

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
            'category_id' => CategoryArcheticture::first() ?: CategoryArcheticture::factory(),
            'type_id' => Type::first() ?: Type::factory(),
            'video' => 'https://www.youtube.com/watch?v=HmZKgaHa3Fg',
            //
        ];
    }
}
