<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoCitaCirugiaToCitaCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::table('cita_cirugias', function (Blueprint $table) {
       //     $table->boolean('estadoCitaCirugia')->nullable(true);
       // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('cita_cirugias', function (Blueprint $table) {
            $table->dropColumn('estadoCitaCirugia');
        });*/
    }
}
