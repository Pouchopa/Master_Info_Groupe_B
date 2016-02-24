<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAlimentationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_alimentations', function(Blueprint $table)
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

			$table->integer('alimentation_id')->unsigned();
			$table->foreign('alimentation_id')
					->references('id')
					->on('alimentations')
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
		Schema::table('patient_alimentations', function(Blueprint $table) {
			$table->dropForeign('patient_alimentations_patient_id_foreign');
			$table->dropForeign('patient_alimentations_alimentation_id_foreign');
		});

		Schema::drop('patient_alimentations');
	}

}
