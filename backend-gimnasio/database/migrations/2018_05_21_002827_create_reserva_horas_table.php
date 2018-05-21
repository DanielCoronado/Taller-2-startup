<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_horas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->time('hora_inicio');
            $table->time('hora_termino');
            $table->date('fecha_reserva');
            $table->string('descripcion', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_horas');
    }
}
