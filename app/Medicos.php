<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    protected $fillable = [ 'nome', 'telefone', 'cpf', 'crm' ];

    protected $dates = [ 'delete_at' ];

    public function agendas()
    {
        return $this->belongsToMany('App\Agendas', 'id_medico');
    }
}
