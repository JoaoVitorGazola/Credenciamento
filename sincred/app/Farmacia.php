<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
    protected $fillable = [
        'cnpj',
        'razaoSocial',
        'email',
        'fixo',
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
