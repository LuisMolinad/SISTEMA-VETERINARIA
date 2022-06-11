<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_cirugias', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->dateTime('fechaHoraCitaCirugia'); //Fecha hora cirugia
            //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
            $table->foreignId('mascota_id')->constrained('mascotas');
           // $table->foreignId('recordatorios_id')->constrained('recordatorios')->cascadeOnDelete();
            $table->string('conceptoCirugia',30);
            $table->string('recomendacionPreoOperatoria',50);
            $table->string('groupId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_cirugias');
    }
}
