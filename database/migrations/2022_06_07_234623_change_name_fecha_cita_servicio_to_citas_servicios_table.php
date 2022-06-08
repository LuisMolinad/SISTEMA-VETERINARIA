<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameFechaCitaServicioToCitasServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita_servicios', function (Blueprint $table) {
           // $table->renameColumn('fechaCitaServicio', 'fechaHoraCitaServicio');
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
           // $table->dateTime('fechaCitaServicio');
        });
    }
}
