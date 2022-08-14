<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificandoTablaRecordatorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recordatorios', function(Blueprint $table){
            $table->integer('estado');
            $table->integer('dias_de_anticipacion');
            $table->dateTime('fecha');
            $table->string('concepto');
            $table->dropColumn('mensajeRecordatorio');
            $table->dropColumn('fechaRecordatorio');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('id_mascota');
        });

        Schema::table('cita_cirugias', function(Blueprint $table){
            $table->foreignId('recordatorio_id')->constrained('recordatorios')->onDelete('cascade')->onUpdate('cascade')->nullable();
        });

        Schema::table('cita_vacunas', function(Blueprint $table){
            $table->foreignId('recordatorio_id')->constrained('recordatorios')->onDelete('cascade')->onUpdate('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recordatorios', function(Blueprint $table){
            $table->dropColumn('estado');
            $table->dropColumn('dias_de_anticipacion');
            $table->dropColumn('fecha');
            $table->dropColumn('concepto',20);
            $table->dropColumn('nombre');
            $table->dropColumn('telefono');
            $table->dropColumn('id_mascota');
            $table->string('mensajeRecordatorio',250);
            $table->date('fechaRecordatorio');
        });

        Schema::table('cita_cirugias', function(Blueprint $table){
            $table->dropColumn('recordatorio_id');
        });

        Schema::table('cita_vacunas', function(Blueprint $table){
            $table->dropColumn('recordatorio_id');
        });
    }
}
