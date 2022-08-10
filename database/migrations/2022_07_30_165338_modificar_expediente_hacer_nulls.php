<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificarExpedienteHacerNulls extends Migration
{
    /**
     * Run the migrations.
     *
     * !Esta migracion es para eliminar fallecido y no haya una redundacia con mascota
     * !Ademas cambiar la causa fallecimiento, que se pueda poner mas
     * 
     * @return void
     */
    public function up()
    {
        Schema::table('expedientes', function(Blueprint $table){
            $table->dropColumn('fallecidoExpediente');
            $table->string('causaFallecimiento', 250)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expedientes', function(Blueprint $table){
            $table->string('fallecidoExpediente');
            $table->string('causaFallecimiento',30)->nullable(false)->change();
        });
    }
}
