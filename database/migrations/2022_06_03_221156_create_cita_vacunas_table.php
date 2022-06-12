<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_vacunas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->foreignId('mascota_id')->constrained('mascotas');
            $table->foreignId('vacuna_id')->constrained('vacunas');
            $table->string('groupId')->nullable();
            $table->dateTime('end');
            $table->dateTime('start');
            $table->string('title',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_vacunas');
    }
}
