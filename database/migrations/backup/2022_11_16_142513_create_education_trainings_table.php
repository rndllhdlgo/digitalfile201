<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('college_name');
            $table->string('college_degree');
            $table->string('college_inclusive_years');
            $table->string('secondary_school_name');
            $table->string('secondary_school_address');
            $table->string('secondary_school_inclusive_years');
            $table->string('primary_school_name');
            $table->string('primary_school_address');
            $table->string('primary_school_inclusive_years');
            $table->string('training_name');
            $table->string('training_title');
            $table->string('training_inclusive_years');
            $table->string('vocational_name');
            $table->string('vocational_course');
            $table->string('vocational_inclusive_years');
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
        Schema::dropIfExists('education_trainings');
    }
}
