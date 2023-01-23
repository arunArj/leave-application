<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('days_limit');
            $table->integer('days_gap');
            $table->integer('casual_per_month');
            $table->integer('sick_per_month');
            $table->integer('max_maternity');
            $table->integer('max_paternity');
            $table->integer('max_bereavement');
            $table->integer('max_other_leave');
            $table->integer('carry_forward_per_year');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_settings');
    }
}
