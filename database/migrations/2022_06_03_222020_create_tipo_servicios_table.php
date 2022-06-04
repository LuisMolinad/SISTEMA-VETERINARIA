<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
            $table->string('nombreServicio');
            $table->string('descripcionServicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_servicios');
    }
}
