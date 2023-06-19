<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalAttainmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_attainments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('empno')->nullable();
            $table->string('secondary_school_name')->nullable();
            $table->string('secondary_school_address')->nullable();
            $table->string('secondary_school_inclusive_years_from')->nullable();
            $table->string('secondary_school_inclusive_years_to')->nullable();
            $table->string('primary_school_name')->nullable();
            $table->string('primary_school_address')->nullable();
            $table->string('primary_school_inclusive_years_from')->nullable();
            $table->string('primary_school_inclusive_years_to')->nullable();
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
        Schema::dropIfExists('educational_attainments');
    }
}
