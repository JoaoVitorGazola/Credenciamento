<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palavra extends Model
{
    protected $fillable = [
        'documentos_id',
        'palavra',
        'quantidade',
    ];
}
