<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordVacunacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_vacunacions', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->foreignId('expediente_id')->constrained('expedientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vacuna_id')->constrained('vacunas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha');
            $table->date('refuerzo');
            $table->string('peso');
            $table->string('record_vacunacions.updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_vacunacions');
    }
}
