<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientProfessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_professions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('dateDebut');
			$table->string('dateFin');
			$table->integer('nbrHeurParSemaine');
			$table->text('description');

			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')
					->references('id')
					->on('patients')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->integer('profession_id')->unsigned();
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
		Schema::table('patient_professions', function(Blueprint $table) {
			$table->dropForeign('patient_professions_patient_id_foreign');
			$table->dropForeign('patient_professions_profession_id_foreign');
		});

		Schema::drop('patient_professions');
	}

}
