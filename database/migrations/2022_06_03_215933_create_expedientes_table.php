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
            $table->foreignId('mascota_id')->constrained('mascotas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('causaFallecimiento', 250)->nullable();
            //  $table->dropColumn('fallecidoExpediente');
            // $table->string('causaFallecimiento', 250)->nullable()->change();
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
