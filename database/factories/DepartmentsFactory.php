<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department' => $this->faker->name(),
            'reporting_emails' => $this->faker->email(),
            'status' => $this->faker->randomElement([0,1])
        ];
    }
}
