<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consultations', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->timestamps();
			$table->date('date');
			$table->text('description');
			$table->text('commentaireKine');
			$table->text('commentairePatient');
			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')
					->references('id')
					->on('patients')
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
		Schema::table('consultations', function(Blueprint $table) {
			$table->dropForeign('consultations_patient_id_foreign');
		});
		Schema::drop('consultations');
	}

}