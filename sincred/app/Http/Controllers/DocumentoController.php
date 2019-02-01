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
    public function salvar(Request $request, $id)
    {
        $teste = Documento::query();
        $comparador = $teste->where('processos_id', $id)->get();
        foreach ($comparador as $compara) {
            if ($compara->tipo == $request->tipo) {
                \Session::flash('erro', 'Documento já Cadastrado.');
                return redirect()->back();
            }
        }

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
       
        $teste = Palavra::query();
        $comparador = $teste->where('documentos_id', $request->documentos_id)->get();
        foreach ($comparador as $compara) {
            if ($compara->palavra == $request->palavra) {
                \Session::flash('erroPalavra', 'Palavra já cadastrada neste documento.');
                return redirect()->back();
            }
        }

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

}
