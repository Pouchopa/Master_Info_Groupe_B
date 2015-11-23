<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaladieChroniqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('maladie_chronique', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('libelle_maladie', 100)->unique();
            $table->text('description_maladie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maladie_chronique');
    }
}
