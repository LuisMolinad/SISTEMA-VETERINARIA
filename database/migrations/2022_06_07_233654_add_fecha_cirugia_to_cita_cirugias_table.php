<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechaCirugiaToCitaCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita_cirugias', function (Blueprint $table) {
            $table->dateTime('fechaHoraCitaCirugia');
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
            $table->dropColumn('fechaHoraCitaCirugia');
        });
    }
}
