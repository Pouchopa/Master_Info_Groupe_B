<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesuresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mesures', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->timestamps();
			$table->integer('taille');
			$table->integer('poids');
			$table->integer('pointure');
			$table->integer('taux_de_graisse')->nullable();
			$table->integer('taux_de_muscle')->nullable();
			$table->integer('masse_osseuse')->nullable();
			$table->string('date');
			$table->text('description');
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
		Schema::table('mesures', function(Blueprint $table) {
			$table->dropForeign('mesures_patient_id_foreign');
		});
		Schema::drop('mesures');
	}

}
