<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientVillesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_villes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->date('dateDebut');
			$table->date('dateFin');
			$table->text('description');

			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')
					->references('id')
					->on('patients')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->integer('ville_id')->unsigned();
			$table->foreign('ville_id')
					->references('id')
					->on('villes')
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
		Schema::table('patient_villes', function(Blueprint $table) {
			$table->dropForeign('patient_villes_patient_id_foreign');
			$table->dropForeign('patient_villes_ville_id_foreign');
		});

		Schema::drop('patient_villes');
	}

}
