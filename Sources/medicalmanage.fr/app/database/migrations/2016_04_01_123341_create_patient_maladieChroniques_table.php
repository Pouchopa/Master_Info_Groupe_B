<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMaladieChroniquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('patient_maladieChroniques', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->text('description');

			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')
					->references('id')
					->on('patients')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->integer('maladieChronique_id')->unsigned();
			$table->foreign('maladieChronique_id')
					->references('id')
					->on('maladieChroniques')
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
		//
		Schema::table('patient_maladieChroniques', function(Blueprint $table) {
			$table->dropForeign('patient_maladieChroniques_patient_id_foreign');
			$table->dropForeign('patient_maladieChroniques_maladieChronique_id_foreign');
		});
		Schema::drop('patient_maladieChroniques');
	}

}
