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
        return view('documentos.palavras', ['documentos'=>$documentos, 'id'=>$id]);
    }
    public function palavrassalvar(Request $request, $id){
        $palavra = new Palavra($request->all());
        $palavra->save();
        return redirect('/'.$id.'/documentos/palavras');
    }
    public function excluirPalavra($id)
    {

        $palavra = Palavra::findOrFail($id);
        \Session::flash('excluirPalavra', $palavra->palavra.' excluido com sucesso.');
        $palavra->delete();
        return redirect()->back();
    }
    public function excluir($id)
    {

        $documento = Documento::findOrFail($id);
        \Session::flash('excluir', $documento->tipo.' excluido com sucesso.');
        $documento->delete();
        return redirect()->back();
    }

    public function editarDoc()
    {
        return view('documentos.editardoc');
    }

     public function editarPalavra()
    {
        return view('documentos.editarpalavras');
    }
}
