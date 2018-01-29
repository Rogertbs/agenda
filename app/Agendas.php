<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agendas extends Model
{
     protected $fillable = [ 'data', 'hora', 'id_paciente', 'id_medico' ];

     protected $dates = [ 'delete_at' ];

     use SoftDeletes;

     public function medicos()
     {
         return $this->belongsTo('App\Medicos', 'id_medico');
     }

     public function pacientes()
     {
         return $this->belongsTo('App\Pacientes', 'id_paciente');
     }
}
