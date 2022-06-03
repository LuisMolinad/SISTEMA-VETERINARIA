<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_servicios', function (Blueprint $table) {

            $table->bigIncrements('id');
            //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
            $table->foreignId('tipoServicio_id')->constrained('tipo_servicios')->cascadeOnDelete();
            $table->string('notaServicio',30);
            $table->string('nombreMascotaServicio',15);
            $table->dateTime('fechaCitaServicio');
            $table->string('clienteServicio',20);
            $table->string('telefonoServicio',8);
            $table->boolean('estadoServicio');
            $table->time('horaServicio');
            $table->string('razaServicio',8);
            $table->string('colorServicio',8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_servicios');
    }
}
