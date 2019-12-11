<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisadoSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visado_salidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('fecha_salida');
            $table->string('motivo_salida')->nullable();
            $table->ipAddress('ip_salida');
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
        Schema::dropIfExists('visado_salidas');
    }
}
