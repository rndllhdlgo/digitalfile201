<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resignation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('resignation_reason')->nullable();
            $table->string('resignation_date')->nullable();
            $table->string('resignation_file')->nullable();
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
        Schema::dropIfExists('resignation');
    }
}
