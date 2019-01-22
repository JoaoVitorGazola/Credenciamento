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
    public function busca(Request $request)
    {
        $processo = Processo::query();
            if ($request->nome != null) {
                $processo->where('nome', $request->nome);
            }
            if ($request->inicio != null) {
                $processo->where('inicio', $request->inicio);
            }
            if ($request->final !=null) {
                $processo->where('final', $request->final);
            }
            if ($request->status != null) {
                $processo->where('status', $request->status);
            }
        $processos = $processo->get();

        \Session::flash('status', count($processos).' resultados encontrados ');
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
