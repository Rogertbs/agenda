<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendas extends Model
{
     protected $fillable = [ 'data', 'hora', 'id_paciente', 'id_medico' ];

     protected $dates = [ 'delete_at' ];


     public function medicos()
     {
         return $this->belongsTo('App\Medicos');
     }

     public function pacientes()
     {
         return $this->belongsTo('App\Pacientes');
     }
}
