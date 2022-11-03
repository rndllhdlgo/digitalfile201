<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('suffix');
            $table->string('birthday');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('street');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('email_address');
            $table->string('telephone_number');
            $table->string('cellphone_number');
            $table->string('spouse_name');
            $table->string('spouse_contact_number');
            $table->string('spouse_profession');
            $table->string('father_name');
            $table->string('father_contact_number');
            $table->string('father_profession');
            $table->string('mother_name');
            $table->string('mother_contact_number');
            $table->string('mother_profession');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_number');
            $table->string('employee_company');
            $table->string('employee_branch');
            $table->string('employee_status');
            $table->string('employee_shift');
            $table->string('employee_position');
            $table->string('employee_supervisor');
            $table->string('date_hired');
            $table->string('employee_email_address');
            $table->string('employee_contact_number');
            $table->string('sss_number');
            $table->string('pag_ibig_number');
            $table->string('philhealth_number');
            $table->string('tin_number');
            $table->string('account_number');
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
        Schema::dropIfExists('employees');
    }
}
