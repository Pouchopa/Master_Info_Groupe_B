<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateurPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur_patient', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('pseudo', 20)->unique();
            $table->string('mot_de_passe', 20);
            $table->string('nom', 40);
            $table->string('prenom', 40);
            $table->enum('sexe', ['H', 'F']);
            $table->date('date_naissance');
            $table->string('email', 40)->unique();
            $table->integer('taux_de_graisse')->nullable();
            $table->integer('taux_de_muscle')->nullable();
            $table->integer('masse_osseuse')->nullable();
            $table->integer('heures_travaillees')->nullable();
            $table->integer('nbr_enfants')->nullable();
            $table->enum('situation_familiale', ['Célibataire', 'En Couple', 'Marié(e)', 'Pacsé(e)', 'Divorcé(e)'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('utilisateur_patient');
    }
}
