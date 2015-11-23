<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_patient', function (Blueprint $table) {
            $table->date('date_operation');
            $table->integer('patient_id')->references('id')->on('utilisateur_patient');
            $table->integer('operation_id')->references('id')->on('operation');
            $table->text('commentaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operation_patient');
    }
}
