<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Processo;

class ProcessoController extends Controller
{
    public function index()
    {
        $processos = Processo::all();
        return view('processos.processo', ['processos' => $processos]);
    }
    public function detalhes($id){

        $processo = Processo::findOrFail($id);
        return view('processos.detalhes', ['processo' => $processo]);
    }

}
