<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @param $factory
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Stock A', 'Stock B', 'Stock D', 'Stock E']),
            'alias' => $this->faker->company,
            'total_amount' => $this->faker->numberBetween(0, 200),
            'init_price' => $this->faker->numberBetween(0, 9999999),
            'created_at' => $this->faker->dateTime
        ];
    }
}
