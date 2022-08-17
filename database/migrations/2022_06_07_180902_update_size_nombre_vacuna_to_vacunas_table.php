<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSizeNombreVacunaToVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacunas', function (Blueprint $table) {
            $table->string('nombreVacuna',255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacunas', function (Blueprint $table) {
            $table->string('nombreVacuna',255)->change();
        });
    }
}
