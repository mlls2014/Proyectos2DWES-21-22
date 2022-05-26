<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'teacher_id' => $this->faker->numberBetween(2,3),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'limit_date' => $this->faker->date(),
            'lenght' => $this->faker->numberBetween(10,140),
            'description' => $this->faker->sentence(),
            'capacity' => $this->faker->numberBetween(1,100),
            'rate' => $this->faker->randomFloat(2,100,6000),
        ];
    }
}
