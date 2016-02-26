<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientActivitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_activites', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('dateDebut');
			$table->string('dateFin');
			$table->text('description');

			$table->integer('patient_id')->unsigned()->index();
			$table->foreign('patient_id')
					->references('id')
					->on('patients')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->integer('activite_id')->unsigned()->index();
			$table->foreign('activite_id')
					->references('id')
					->on('activites')
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
		Schema::table('patient_activites', function(Blueprint $table) {
			$table->dropForeign('patient_activites_patient_id_foreign');
			$table->dropForeign('patient_activites_activite_id_foreign');
		});

		Schema::drop('patient_activites');
	}

}
