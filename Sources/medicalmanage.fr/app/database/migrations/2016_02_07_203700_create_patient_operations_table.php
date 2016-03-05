<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientOperationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_operations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('date');
			$table->text('description');

			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')
					->references('id')
					->on('patients')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->integer('operation_id')->unsigned();
			$table->foreign('operation_id')
					->references('id')
					->on('operations')
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
		Schema::table('patient_operations', function(Blueprint $table) {
			$table->dropForeign('patient_operations_patient_id_foreign');
			$table->dropForeign('patient_operations_operation_id_foreign');
		});
		Schema::drop('patient_operations');
	}

}
