<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisadoEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visado_entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('fecha_entrada');
            $table->string('motivo_entrada');
            $table->ipAddress('ip_entrada');
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
        Schema::dropIfExists('visado_entradas');
    }
}
