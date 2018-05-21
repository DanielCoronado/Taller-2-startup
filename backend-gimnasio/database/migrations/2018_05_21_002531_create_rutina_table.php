<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutina', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_rutina');
            $table->foreign('id_tipo_rutina')->references('id')->on('tipo_rutina')->onDelete('cascade');
            $table->integer('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->string('nombre_rutina', 50);
            $table->string('descripcion', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutina');
    }
}
