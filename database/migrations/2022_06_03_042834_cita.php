<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            //para borrado en cascada
            $table->engine = "InnoDB";

            $table->bigIncrements('id');
             //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
             $table->foreignId('mascota_id')->constrained('mascota')->cascadeOnDelete();
             $table->dateTime('fechaCita');
             $table->boolean('estadoCita');

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
