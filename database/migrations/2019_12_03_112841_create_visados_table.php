<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('visado_entradas')->unsigned();
            $table->foreign('visado_entradas')->references('id')->on('visado_entradas');
            $table->bigInteger('visado_salidas')->unsigned()->nullable();
            $table->foreign('visado_salidas')->references('id')->on('visado_salidas');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('terminado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visados');
    }
}
