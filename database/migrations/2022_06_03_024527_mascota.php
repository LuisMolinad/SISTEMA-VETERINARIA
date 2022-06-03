<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function GuzzleHttp\Promise\task;

class Mascota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('mascota', function (Blueprint $table) {
               //para borrado en cascada
               $table->engine = "InnoDB";

                $table->bigIncrements('id');
                $table->string('idMascota',15);
                //convencion de laravel para llaves foraneas
                $table->foreignId('propietario_id')->constrained('propietario');
                $table->string('nombreMascota',15);
                $table->string('razaMascota',15);
                $table->string('especie',15);
                $table->string('colorMascota',15);
                $table->string('sexoMascota',1);
                $table->dateTime('fechaNacimiento');
                $table->boolean('fallecitoMascota');
                $table->string('caracteristicasEspeciales',100);

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
