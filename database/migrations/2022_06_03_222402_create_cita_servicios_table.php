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
            $table->engine = "InnoDB";
            /*$table->bigIncrements('id');*/
            //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
            $table->id();
            $table->string('title',15);
            $table->time('horaServicio');
            $table->dateTime('start');
            $table->string('clienteServicio',20);
            $table->string('telefonoServicio',8);
            $table->text('descripcion');
            /*$table->boolean('estadoServicio');*/
            $table->string('razaServicio',8);
            $table->string('colorServicio',8);
            $table->string('color',20);
            $table->dateTime("end");
            $table->string('groupId')->nullable();
            $table->foreignId('tipoServicio_id')->constrained('tipo_servicios')->cascadeOnDelete();
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
        Schema::dropIfExists('cita_servicios');
    }
}
