<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasPostoperatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas_postoperatorias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tratamientoAplicarReceta', 255);
            $table->integer('pesoReceta')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas_postoperatorias');
    }
}
