<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCerradaToSurgerys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surgerys', function (Blueprint $table) {
            $table->integer('cerrada');
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
           $table->dropColumn('cerrada');
        });
    }
}
