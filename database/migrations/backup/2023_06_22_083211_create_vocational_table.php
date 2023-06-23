<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocationalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocationals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('empno')->nullable();
            $table->string('vocational_name')->nullable();
            $table->string('vocational_course')->nullable();
            $table->string('vocational_inclusive_years_from')->nullable();
            $table->string('vocational_inclusive_years_to')->nullable();
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
        Schema::dropIfExists('vocationals');
    }
}
