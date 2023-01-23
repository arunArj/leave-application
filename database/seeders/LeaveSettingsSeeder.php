<?php

namespace Database\Seeders;

use App\Models\LeaveSettings;
use Illuminate\Database\Seeder;

class LeaveSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveSettings::factory()
        ->count(1)
        ->create();
    }
}
