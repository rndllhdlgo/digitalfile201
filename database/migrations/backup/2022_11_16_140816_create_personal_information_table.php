<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix');
            $table->string('nickname');
            $table->string('birthday');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('street');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('height');
            $table->string('weight');
            $table->string('religion');
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
            $table->string('employee_image');
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
        Schema::dropIfExists('personal_information');
    }
}
