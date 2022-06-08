<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteCamposCitaServiciosToCitaServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita_servicios', function (Blueprint $table) {
            /*$table->dropColumn('horaServicio');*/
            $table->dropColumn('razaServicio');
            $table->dropColumn('colorServicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cita_servicios', function (Blueprint $table) {
            $table->string('razaServicio',8);
            $table->string('colorServicio',8);
        });
    }
}
