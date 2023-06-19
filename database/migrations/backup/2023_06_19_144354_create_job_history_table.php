<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('empno')->nullable();
            $table->string('job_company_name')->nullable();
            $table->string('job_description')->nullable();
            $table->string('job_position')->nullable();
            $table->string('job_contact_number')->nullable();
            $table->string('job_inclusive_years_from')->nullable();
            $table->string('job_inclusive_years_to')->nullable();
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
        Schema::dropIfExists('job_history');
    }
}
