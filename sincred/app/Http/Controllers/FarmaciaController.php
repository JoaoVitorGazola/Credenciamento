<?php

namespace App\Http\Controllers;

use App\Farmacia;
use App\State;
use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    public function farmacia()
    {
        $farmacia = Farmacia::query();
        $farmacias = $farmacia->orderBy('razaoSocial')->get();
        $estado = State::query();
        $estados = $estado->orderBy('abbreviation')->get();
    	return view('farmacia.farmacia', ['farmacias'=>$farmacias, 'estados'=>$estados]);
    }

    public function novo()
    {
        return view('farmacia.cadastrar');
    }

    public function responsavel()
    {
        return view('farmacia.responsavel');
    }
}
