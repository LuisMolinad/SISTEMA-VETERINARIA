<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Expediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente', function (Blueprint $table) {
            //para borrado en cascada
            $table->engine = "InnoDB";

             $table->bigIncrements('id');
             //convencion de laravel para llaves foraneas
             $table->foreignId('mascota_id')->constrained('mascota')->cascadeOnDelete();
             $table->string('causaFallecimiento',30);
             $table->boolean('fallecidoExpediente');

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
