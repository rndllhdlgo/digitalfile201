<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('barangay_clearance_file')->nullable();
            $table->string('birthcertificate_file')->nullable();
            $table->string('diploma_file')->nullable();
            $table->string('medical_certificate_file')->nullable();
            $table->string('nbi_clearance_file')->nullable();
            $table->string('pag_ibig_file')->nullable();
            $table->string('philhealth_file')->nullable();
            $table->string('police_clearance_file')->nullable();
            $table->string('resume_file')->nullable();
            $table->string('sss_file')->nullable();
            $table->string('transcript_of_records_file')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
