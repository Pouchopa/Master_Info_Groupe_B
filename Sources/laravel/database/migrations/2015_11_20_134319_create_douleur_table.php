<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDouleurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('douleur', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('intensite_douleur', 20);
            $table->string('position_douleur', 50);
            $table->string('evolution_douleur', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('douleur');
    }
}
