<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Farmacia;
use Illuminate\Http\Request;
use App\Processo;

class ProcessoController extends Controller
{
    public function index()
    {
        $processo = Processo::query();
        $processos = $processo->orderBy('nome')->get();
        return view('processos.processo', ['processos' => $processos]);
    }
    public function busca(Request $request)
    {
        $processo = Processo::query();
            if ($request->nome != null) {
                $processo->where('nome', 'like', '%'.$request->nome.'%');
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
        $processos = $processo->orderBy('nome')->get();

        \Session::flash('encontrado', count($processos).' resultados encontrados ');
        return view('processos.processo', ['processos' => $processos]);

    }
    public function detalhes($id){

        $processo = Processo::findOrFail($id);
        $documentos = Documento::where('processos_id', $id)->orderBy('tipo')->get();
        return view('processos.detalhes', ['processo' => $processo, 'documentos' => $documentos]);
    }
    public function excluir($id){

        $processo = Processo::findOrFail($id);
        \Session::flash('encontrado', $processo->nome.' excluido com sucesso');
        $processo->delete();
        return redirect('/processos');
    }

    public function verificar($id){

        $processo = Processo::findOrFail($id);
        $documentos = Documento::where('processos_id', $id)->get();
        $farmacias = Farmacia::all();
        return view('processos.verificar', ['processo' => $processo, 'documentos' => $documentos, 'farmacias'=>$farmacias]);
    }

    public function novo()
    {
        return view('processos.cadastrar');
    }

}
