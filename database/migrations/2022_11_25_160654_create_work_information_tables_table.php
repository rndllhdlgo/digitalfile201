<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkInformationTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_information_tables', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number');
            $table->string('employee_company');
            $table->string('employee_branch');
            $table->string('employee_status');
            $table->string('employment_origin');
            $table->string('employee_salary');
            $table->string('employee_shift');
            $table->string('employee_position');
            $table->string('employee_supervisor');
            $table->string('date_hired');
            $table->string('company_email_address');
            $table->string('company_contact_number');
            $table->string('sss_number');
            $table->string('pag_ibig_number');
            $table->string('philhealth_number');
            $table->string('tin_number');
            $table->string('account_number');
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
        Schema::dropIfExists('work_information_tables');
    }
}
