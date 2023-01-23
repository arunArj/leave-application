<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveSettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => 340,
            'days_limit' =>30,
            'days_gap' =>2,
            'casual_per_month' =>1,
            'sick_per_month'=>1,
            'carry_forward_per_year'=>3,
            'max_maternity'=>60,
            'max_paternity'=>2,
            'max_bereavement'=>2,
            'max_other_leave'=>10
        ];
    }
}
