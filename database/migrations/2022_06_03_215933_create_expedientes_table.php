<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
             //para borrado en cascada
             $table->engine = "InnoDB";

             $table->bigIncrements('id');
             //convencion de laravel para llaves foraneas
             $table->foreignId('mascota_id')->constrained('mascotas');
             $table->string('causaFallecimiento',30);
             $table->string('fallecidoExpediente',9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
}
