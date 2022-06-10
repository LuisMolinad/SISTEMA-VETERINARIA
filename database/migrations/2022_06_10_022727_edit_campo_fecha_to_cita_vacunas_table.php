<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditCampoFechaToCitaVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita_vacunas', function (Blueprint $table) {
            $table->renameColumn('fechaRefuerzo', 'start');
            $table->renameColumn('fechaAplicacion', 'end');
            $table->string('title',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cita_vacunas', function (Blueprint $table) {
            //
        });
    }
}
