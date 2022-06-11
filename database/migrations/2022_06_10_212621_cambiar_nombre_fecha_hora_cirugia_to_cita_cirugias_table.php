<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CambiarNombreFechaHoraCirugiaToCitaCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita_cirugias', function (Blueprint $table) {
            //$table->renameColumn('fechaRefuerzo', 'start');
            $table->renameColumn('fechaHoraCitaCirugia', 'start');
            $table->string('title',20);
            $table->string('end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cita_cirugias', function (Blueprint $table) {
            //
        });
    }
}
