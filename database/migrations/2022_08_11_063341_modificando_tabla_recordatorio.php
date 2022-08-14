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
            $table->date('fecha');
            $table->string('concepto');
            $table->dropColumn('mensajeRecordatorio');
            $table->dropColumn('fechaRecordatorio');
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
            $table->string('mensajeRecordatorio',250);
            $table->date('fechaRecordatorio');
        });
    }
}
