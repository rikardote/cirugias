<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHospExtToSurgerys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surgerys', function (Blueprint $table) {
            $table->string('ubicacion');
            $table->string('cirugia_realizada');
            $table->integer('tiempo_qx');
            $table->string('hora_inicio');
            $table->string('hora_final');
            $table->integer('suspendida');
            $table->integer('reprogramada');
            $table->integer('urgencias');
            $table->string('observaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surgerys', function (Blueprint $table) {
            $table->dropColumn('ubicacion');
            $table->dropColumn('cirugia_realizada');
            $table->dropColumn('tiempo_qx');
            $table->dropColumn('hora_inicio');
            $table->dropColumn('hora_final');
            $table->dropColumn('suspendida');
            $table->dropColumn('reprogramada');
            $table->dropColumn('urgencias');
            $table->dropColumn('observaciones');

        });
    }
}
