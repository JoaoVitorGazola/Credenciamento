<?php

namespace App\Http\Controllers;

use App\Farmacia;
use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    public function farmacia()
    {
        $farmacia = Farmacia::query();
        $farmacias = $farmacia->orderBy('razaoSocial')->get();
    	return view('farmacia.farmacia', ['farmacias'=>$farmacias]);
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
