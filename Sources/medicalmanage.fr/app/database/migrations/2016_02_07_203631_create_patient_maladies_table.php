<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMaladiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_maladies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')
					->references('id')
					->on('patients')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->integer('maladie_id')->unsigned();
			$table->foreign('maladie_id')
					->references('id')
					->on('maladies')
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
		Schema::table('patient_maladies', function(Blueprint $table) {
			$table->dropForeign('patient_maladies_patient_id_foreign');
			$table->dropForeign('patient_maladies_maladie_id_foreign');
		});
		Schema::drop('patient_maladies');
	}

}
