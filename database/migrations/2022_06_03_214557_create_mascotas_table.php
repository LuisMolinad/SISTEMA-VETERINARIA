<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->bigIncrements('id');
            $table->string('idMascota',15);
            //convencion de laravel para llaves foraneas
            $table->foreignId('propietario_id')->constrained('propietarios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombreMascota',15);
            $table->string('razaMascota',15);
            $table->foreignId('especie_id')->constrained('especies')->onDelete('cascade')->onUpdate('cascade');;
            $table->string('colorMascota',15);
            $table->string('sexoMascota',6);
            $table->string('fechaNacimiento',12);
            $table->string('fallecidoMascota',9);
            $table->string('caracteristicasEspeciales',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
