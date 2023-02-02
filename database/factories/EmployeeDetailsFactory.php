<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Departments;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'company_id' => Company::factory(),
            'job_status' => $this->faker->randomElement([0,1]),
            'department_id' => Departments::factory(),
            'permanent_status_date' =>$this->faker->date(),
            'mail_id' => $this->faker->email(),
            'image' => $this->faker->image(),
            'joining_date' => $this->faker->date(),
            'designation' => $this->faker->jobTitle(),
            'employee_id' => $this->faker->regexify('EMP[A-Za-z0-9]{6}'),
            'casual_leave' => $this->faker->randomDigit(),
            'sick_leave' => $this->faker->randomDigit(),
            'status' => $this->faker->randomElement([0,1]),
            'optional_holiday_used' => $this->faker->randomElement([0,1]),
            'gender' => $this->faker->randomElement([0,1]),
            'marital_status' => $this->faker->randomElement([0,1]),
            'saturday_leave' => $this->faker->randomDigit()
        ];
    }
}
