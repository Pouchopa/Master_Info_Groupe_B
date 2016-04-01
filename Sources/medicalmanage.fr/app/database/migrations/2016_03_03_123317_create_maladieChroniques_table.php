<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaladieChroniquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('maladieChroniques', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->timestamps();
			$table->string('libelle', 100)->unique();
			$table->text('description');
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
		Schema::drop('maladieChroniques');
	}

}
