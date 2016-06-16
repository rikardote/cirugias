<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnestesiologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anestesiologos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 60);
            $table->string('apellido_pat', 60);
            $table->string('apellido_mat', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anestesiologos');
    }
}
