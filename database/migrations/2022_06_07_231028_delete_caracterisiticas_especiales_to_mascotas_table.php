<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteCaracterisiticasEspecialesToMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn('caracteristicasEspeciales');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('mascotas', function (Blueprint $table) {
            $table->string('caracteristicasEspeciales',100);
        });*/
    }
}
