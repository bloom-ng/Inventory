<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ItemLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemLocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->randomNumber,
            'description' => $this->faker->text,
        ];
    }
}
