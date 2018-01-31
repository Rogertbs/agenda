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
      Schema::create('agendas', function (Blueprint $table) {
          $table->increments('id');
          $table->date('data');
          $table->time('hora');
          $table->integer('id_paciente')->unsigned();
          $table->integer('id_medico')->unsigned();
          $table->timestamps();
          $table->softDeletes();
          $table->foreign('id_paciente')->on('pacientes')->references('id')->onDelete('cascade');
          $table->foreign('id_medico')->on('medicos')->references('id')->onDelete('cascade');
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
