<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaLimpiezaDentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_limpieza_dentals', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->dateTime('start');
            //Establezco la relación con la tabla mascota
            $table->foreignId('mascota_id')->constrained('mascotas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('groupId')->nullable();
            $table->string('title',20);
            $table->string('end')->nullable();
            $table->string('filterLimpiezaDental',50);
            $table->integer('recordatorio_id')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_limpieza_dentals');
    }
}
