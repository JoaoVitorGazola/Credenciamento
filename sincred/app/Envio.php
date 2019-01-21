<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $fillable = [
        'processos_id',
        'farmacias_id',
        'responsaveis_id',
        'pasta'
    ];
}
