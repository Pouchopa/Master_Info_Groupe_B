<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateurAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur_admin', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('pseudo', 20)->unique();
            $table->string('mot_de_passe', 20);
            $table->string('nom', 40);
            $table->string('prenom', 40);
            $table->string('email', 40)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('utilisateur_admin');
    }
}
