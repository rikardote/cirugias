<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgerys', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('horario');
            $table->integer('sala');
            $table->integer('paciente_id');
            $table->integer('medico_id');
            $table->integer('cirugia_id');
            $table->integer('anestesiologo_id');
            $table->timestamps();

            //$table->foreign('paciente_id')->references('id')->on('pacientes.pacientes');
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('anestesiologo_id')->references('id')->on('anestesiologos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('surgerys');
    }
}
