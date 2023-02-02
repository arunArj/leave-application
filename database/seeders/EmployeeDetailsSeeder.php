<?php

namespace Database\Seeders;

use App\Models\EmployeeDetails;
use Illuminate\Database\Seeder;

class EmployeeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeDetails::factory()
            ->count(25)
            ->create();
    }
}
