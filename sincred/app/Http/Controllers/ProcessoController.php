<?php

namespace App\Http\Controllers;

use App\Documento;
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
        $documentos = Documento::where('processos_id', $id)->get();
        return view('processos.detalhes', ['processo' => $processo, 'documentos' => $documentos]);
    }

    public function verificar($id){

         $processo = Processo::findOrFail($id);
        $documentos = Documento::where('processos_id', $id)->get();
        return view('processos.verificar', ['processo' => $processo, 'documentos' => $documentos]);
    }

}
