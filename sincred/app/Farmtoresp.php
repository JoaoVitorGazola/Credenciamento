<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmtoresp extends Model
{
    protected $fillable = [
        'farmacias_id',
        'responsaveis_id',
    ];
    protected $primaryKey = ['responsaveis_id', 'farmacias_id'];
}
