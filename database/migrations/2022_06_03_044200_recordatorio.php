<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recordatorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordatorio', function (Blueprint $table) {
            //para borrado en cascada
           // $table->engine = "InnoDB";

            $table->bigIncrements('id');
             //convencion de laravel para llaves foraneas, no estoy seguro del cascade on delete o en oupdate
            // $table->foreignId('cita_id')->constrained('cita')->cascadeOnDelete();
             $table->string('mensajeRecordatorio',150);
             $table->dateTime('fechaRecordatorio');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
