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
      });

      Schema::table('agenda', function($table){
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_medico')->references('id')->on('medicos');
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
