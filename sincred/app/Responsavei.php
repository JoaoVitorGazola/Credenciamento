<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavei extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'celular',
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'states_id',
        'cities_id'
    ];
}
