<?php

namespace App\Http\Controllers;

use App\Citie;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function getCidade($idEstado){
        $cidade = Citie::query();
        return $cidade->where('state_id', $idEstado)->orderBy('name')->get();
    }
}
