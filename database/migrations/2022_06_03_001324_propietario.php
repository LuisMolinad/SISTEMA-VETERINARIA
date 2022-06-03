<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Propietario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('propietario', function (Blueprint $table) {

        $table->engine = "InnoDB";
        $table->bigIncrements('id');
        $table->string('nombrePropietario',30);
        $table->string('telefonoPropietario',8);
        $table->string('direccionPropietario',30);


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
