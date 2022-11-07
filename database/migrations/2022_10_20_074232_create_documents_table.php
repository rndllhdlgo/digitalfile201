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
            $table->string('birthcertificate');
            $table->string('nbi_clearance');
            $table->string('barangay_clearance');
            $table->string('police_clearance');
            $table->string('sss_form');
            $table->string('philhealth_form');
            $table->string('pag_ibig_form');
            $table->string('medical_certificate');
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
