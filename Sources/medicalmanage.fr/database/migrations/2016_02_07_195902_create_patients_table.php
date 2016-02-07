<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->timestamps();
			$table->string('pseudo', 20)->unique();
			$table->string('mot_de_passe', 20);
			$table->string('nom', 40);
			$table->string('prenom', 40);
			$table->enum('sexe', ['H', 'F']);
			$table->date('date_naissance');
			$table->string('email', 40)->unique();
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
		Schema::drop('patients');
	}

}
