<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function novo()
    {
        $documento = Documento::query();
        $documentos = $documento->orderBy('tipo')->get();
        return view('documentos.docrequisitado', ['documentos' => $documentos]);
    }

    public function palavras()
    {
        return view('documentos.palavras');
    }

    public function excluir($id)
    {

        $documento = Documento::findOrFail($id);
        \Session::flash('excluir', $documento->tipo.' excluido com sucesso');
        $documento->delete();
        return redirect('/documentos/novo');
    }
}
