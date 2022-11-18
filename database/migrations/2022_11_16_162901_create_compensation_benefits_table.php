<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompensationBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('employee_salary');
            $table->string('employee_incentives');
            $table->string('employee_overtime_pay');
            $table->string('employee_bonus');
            $table->string('employee_insurance');
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
        Schema::dropIfExists('compensation_benefits');
    }
}
