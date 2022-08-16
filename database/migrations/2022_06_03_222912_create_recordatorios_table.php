<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordatorios', function (Blueprint $table) {
            //para borrado en cascada
            $table->engine = "InnoDB";

            $table->bigIncrements('id');
            $table->integer('estado');
            $table->integer('dias_de_anticipacion');
            $table->dateTime('fecha');
            $table->string('concepto');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('id_mascota');
            //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
            // $table->foreignId('cita_id')->constrained('cita')->cascadeOnDelete();


        });
        Schema::table('cita_cirugias', function (Blueprint $table) {
            $table->integer('recordatorio_id')->nullable();
        });

        Schema::table('citaVacunas', function (Blueprint $table) {
            $table->integer('recordatorio_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recordatorios');

        Schema::table('cita_cirugias', function (Blueprint $table) {
            $table->dropColumn('recordatorio_id');
        });

        Schema::table('citaVacunas', function (Blueprint $table) {
            $table->dropColumn('recordatorio_id');
        });
    }
}
