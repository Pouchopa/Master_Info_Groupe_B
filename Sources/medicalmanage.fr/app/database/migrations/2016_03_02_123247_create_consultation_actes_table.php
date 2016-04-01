<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationActesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('consultation_actes', function(Blueprint $table)
		{
			$table->integer('consultation_id')->unsigned();
			$table->foreign('consultation_id')
					->references('id')
					->on('consultations')
					->onDelete('restrict')
					->onUpdate('restrict');

			$table->integer('acte_id')->unsigned();
			$table->foreign('acte_id')
					->references('id')
					->on('actes')
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
		Schema::table('consultation_actes', function(Blueprint $table) {
			$table->dropForeign('consultation_actes_consultation_id_foreign');
			$table->dropForeign('consultation_actes_acte_id_foreign');
		});

		Schema::drop('consultation_actes');
	}

}
