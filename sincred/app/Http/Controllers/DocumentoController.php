<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Palavra;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function novo($id)
    {
        $documento = Documento::query();
        $documentos = $documento->where('processos_id', $id)->orderBy('tipo')->get();
        return view('documentos.docrequisitado', ['documentos' => $documentos, 'id'=>$id]);
    }
    public function salvar(Request $request, $id){
        $documento = new Documento($request->all());
        $documento->processos_id = $id;
        $documento->save();
        return redirect()->back();
    }

    public function palavras($id)
    {
        $documento = Documento::query();
        $documentos = $documento->where('processos_id', $id)->orderBy('tipo')->get();
        $palavra = Palavra::query();
        foreach ($documentos as $doc){
            $palavras = $palavra->where('documentos_id', $doc->id)->get();
        }
        return view('documentos.palavras', ['documentos'=>$documentos, 'palavras'=>$palavras]);
    }
    public function palavrassalvar(Request $request){
        $palavra = new Palavra($request->all());
        $palavra->save();
        return redirect()->back();
    }
    public function excluir($id)
    {

        $documento = Documento::findOrFail($id);
        \Session::flash('excluir', $documento->tipo.' excluido com sucesso');
        $documento->delete();
        return redirect('/documentos/novo');
    }
}
