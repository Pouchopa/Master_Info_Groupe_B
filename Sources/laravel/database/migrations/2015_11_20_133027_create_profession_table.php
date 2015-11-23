<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('libelle_profession', 100)->unique();
            $table->boolean('stress_physique');
            $table->boolean('stress_psychique');
            $table->enum('posture_travail', ['Debout', 'Assis']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profession');
    }
}
