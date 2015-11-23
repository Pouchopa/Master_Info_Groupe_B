<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaladiePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maladie_patient', function (Blueprint $table) {
            $table->date('date_maladie');
            $table->integer('patient_id')->references('id')->on('utilisateur_patient');
            $table->integer('maladie_id')->references('id')->on('maladie');
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
        Schema::drop('maladie_patient');
    }
}
