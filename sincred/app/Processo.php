<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
        'nome',
        'descrição',
        'inicio',
        'final',
        'status'
    ];
}
