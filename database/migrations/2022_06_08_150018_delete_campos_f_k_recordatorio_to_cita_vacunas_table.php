<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteCamposFKRecordatorioToCitaVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita_vacunas', function (Blueprint $table) {
            $table-> dropForeign('cita_vacunas_recordatorioid_foreign');
            $table->dropColumn('recordatorioid');
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
