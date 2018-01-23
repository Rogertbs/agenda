<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('agenda', function (Blueprint $table) {
          $table->increments('id');
          $table->date('data');
          $table->time('hora');
          $table->integer('id_paciente')->unsigned();
          $table->integer('id_medico')->unsigned();
          $table->foreign('id_paciente')->on('pacientes')->references('id');
          $table->foreign('id_medico')->on('medicos')->references('id');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agenda');
    }
}
