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
        Schema::create('citaVacunas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->foreignId('mascota_id')->constrained('mascotas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vacuna_id')->constrained('vacunas')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('estadoCita')->nullable(true);
            $table->string('groupId')->nullable(true);
            $table->dateTime('end')->nullable(true);
            $table->dateTime('start');
            $table->string('title', 20);
            $table->string('filtervacunas', 50);
            $table->integer('pesolb')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citaVacunas');
    }
}
