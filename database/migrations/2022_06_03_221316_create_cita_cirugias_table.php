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
            $table->dateTime('start');
            $table->foreignId('mascota_id')->constrained('mascotas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('conceptoCirugia',30);
            $table->string('recomendacionPreoOperatoria',50);
            $table->string('groupId')->nullable();
            $table->string('title',20);
            $table->string('end')->nullable();
            $table->string('filtercirugias',50);
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
