<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string("title",15); //Este es el nombre de la mascota
            $table->string('razaServicio',8);
            $table->string('colorServicio',8);
            $table->time('horaServicio');
            $table->dateTime("start"); //Fecha
            $table->string('clienteServicio',20); 
            $table->string('telefonoServicio',8);
            $table->text("descripcion");
            $table->dateTime("end");
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
        Schema::dropIfExists('eventos');
    }
}
