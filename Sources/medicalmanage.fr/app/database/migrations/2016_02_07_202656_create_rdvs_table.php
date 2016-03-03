<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdvsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rdvs', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->timestamps();
			$table->string('date');
			$table->string('heure');
			$table->text('motif');
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
		Schema::table('rdvs', function(Blueprint $table) {
			$table->dropForeign('rdvs_patient_id_foreign');
		});
		Schema::drop('rdvs');
	}

}
