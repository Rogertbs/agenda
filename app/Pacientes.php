<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $fillable = [ 'nome', 'telefone', 'cpf', 'email' ];

    protected $dates = [ 'delete_at' ];

    public function agendas()
    {
        return $this->belongsToMany('App\Agendas', 'id_paciente');
    }
}
