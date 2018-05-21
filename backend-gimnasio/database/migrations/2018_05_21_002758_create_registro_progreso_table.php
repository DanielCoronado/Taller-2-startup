<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroProgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_progreso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->double('altura');
            $table->double('peso');
            $table->double('imc');
            $table->date('fecha_registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_progreso');
    }
}
