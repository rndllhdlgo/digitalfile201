<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('memo_subject');
            $table->string('memo_date');
            $table->string('memo_penalty');
            $table->string('memo_file');
            $table->string('evaluation_reason');
            $table->string('evaluation_date');
            $table->string('evaluation_evaluated_by');
            $table->string('evaluation_file');
            $table->string('contracts_type');
            $table->string('contracts_date');
            $table->string('contracts_file');
            $table->string('resignation_letter');
            $table->string('resignation_date');
            $table->string('resignation_file');
            $table->string('termination_letter');
            $table->string('termination_date');
            $table->string('termination_file');
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
        Schema::dropIfExists('evaluations');
    }
}
