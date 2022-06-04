<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_historials', function (Blueprint $table) {
              //para borrado en cascada
              $table->engine = "InnoDB";

              $table->bigIncrements('id');
              //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
              $table->foreignId('expediente_id')->constrained('expedientes')->cascadeOnDelete();
              $table->string('observaciones',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_historials');
    }
}
