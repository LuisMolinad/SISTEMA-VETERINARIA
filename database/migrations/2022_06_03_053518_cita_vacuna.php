<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CitaVacuna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citaVacuna', function (Blueprint $table) {
            $table->bigIncrements('id');
            //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
            //$table->foreignId('cita_id')->constrained('cita')->cascadeOnDelete();
            $table->foreignId('mascota_id')->constrained('mascota')->cascadeOnDelete();
            $table->foreignId('vacuna_id')->constrained('vacuna')->cascadeOnDelete();
            $table->dateTime('fechaAplicacion');
            $table->dateTime('fechaRefuerzo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            //
    }
}
