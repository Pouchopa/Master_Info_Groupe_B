<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenement_patient', function (Blueprint $table) {
            $table->date('date_evenement');
            $table->integer('patient_id')->references('id')->on('utilisateur_patient');
            $table->integer('evenement_id')->references('id')->on('evenement');
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
        Schema::drop('evenement_patient');
    }
}
