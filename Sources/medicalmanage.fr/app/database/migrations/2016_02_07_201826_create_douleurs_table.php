<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDouleursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('douleurs', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->timestamps();
			$table->string('position', 50);
			$table->string('intensite', 20);
			$table->date('date');
			$table->string('evolution', 100);
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
		Schema::table('douleurs', function(Blueprint $table) {
			$table->dropForeign('douleurs_patient_id_foreign');
		});
		Schema::drop('douleurs');
	}

}
