<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('empno')->nullable();
            $table->string('college_name')->nullable();
            $table->string('college_degree')->nullable();
            $table->string('college_inclusive_years_from')->nullable();
            $table->string('college_inclusive_years_to')->nullable();
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
        Schema::dropIfExists('college');
    }
}
