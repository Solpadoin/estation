<?php

namespace Database\Factories;

use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

class StationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Station::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city' => $this->faker->city,
            'hour_start' => $this->faker->time('H:m:s', 'now'),
            'hour_end' => $this->faker->time('H:m:s', 'now'),
            'latitude' => $this->faker->randomFloat(3,-999, 999),
            'longitude' => $this->faker->randomFloat(3,-999, 999),
        ];
    }
}
