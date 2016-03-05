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
			$table->string('password', 255);
			$table->string('nom', 40);
			$table->string('prenom', 40);
			$table->string('photo');
			$table->string('sexe');
			$table->string('date_naissance');
			$table->string('email', 40)->unique();
			$table->integer('nbr_enfants')->nullable();
			$table->string('situation_familiale');
			$table->string('numero_tel');
			$table->string('remember_token', 100);
			$table->foreign('ville_id')
					->references('id')
					->on('villes')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->foreign('profession_id')
					->references('id')
					->on('professions')
					->onDelete('restrict')
					->onUpdate('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_ville_id_foreign');
		});
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_profession_id_foreign');
		});

		Schema::drop('patients');
	}

}
