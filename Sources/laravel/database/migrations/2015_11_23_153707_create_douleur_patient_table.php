<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDouleurPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('douleur_patient', function (Blueprint $table) {
            $table->date('date_douleur');
            $table->integer('patient_id')->references('id')->on('utilisateur_patient');
            $table->integer('douleur_id')->references('id')->on('douleur');
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
        Schema::drop('douleur_patient');
    }
}
