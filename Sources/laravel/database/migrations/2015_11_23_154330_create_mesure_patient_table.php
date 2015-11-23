<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesurePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesure_patient', function (Blueprint $table) {
            $table->date('date_mesure');
            $table->integer('patient_id')->references('id')->on('utilisateur_patient');
            $table->integer('mesure_id')->references('id')->on('mesure');
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
        Schema::drop('mesure_patient');
    }
}
