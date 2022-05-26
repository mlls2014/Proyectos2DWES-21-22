<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender_id' => $this->faker->numberBetween(1,12),
            'recipient_id' => $this->faker->numberBetween(1,12),
            'message' => $this->faker->sentence(),
        ];
    }
}
