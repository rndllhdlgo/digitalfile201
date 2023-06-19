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
            $table->string('secondary_school_name');
            $table->string('secondary_school_address');
            $table->string('secondary_school_inclusive_years');
            $table->string('primary_school_name');
            $table->string('primary_school_address');
            $table->string('primary_school_inclusive_years');
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
