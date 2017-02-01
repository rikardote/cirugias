<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechaReprogramadaToSurgeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surgerys', function (Blueprint $table) {
            $table->date('fecha_repro');
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
            $table->dropColumn('fecha_repro');
        });
    }
}
