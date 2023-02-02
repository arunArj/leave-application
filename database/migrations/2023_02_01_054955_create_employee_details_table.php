<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->unsignedBigInteger('company_id');
            $table->tinyInteger('job_status');
            $table->unsignedBigInteger('department_id');
            $table->date('permanent_status_date')->nullable();
            $table->string('mail_id');
            $table->string('image')->nullable();
            $table->date('joining_date');
            $table->string('designation');
            $table->string('employee_id');
            $table->integer('casual_leave');
            $table->integer('sick_leave');
            $table->tinyInteger('status');
            $table->string('optional_holiday_used')->nullable();
            $table->tinyInteger('gender');
            $table->tinyInteger('marital_status');
            $table->integer('saturday_leave');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_details');
    }
}
