<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $yesterday = Carbon::now()->subDay();
        return [
            'user_id' => $this->faker->numberBetween(1, 500),
            'amount' => $this->faker->numberBetween(10, 1000),
            'created_at' => $this->faker->dateTimeBetween($yesterday, 'now'),
        ];
    }
}
