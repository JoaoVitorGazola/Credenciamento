<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function novo()
    {
        return view('documentos.docrequisitado');
    }

    public function palavras()
    {
        return view('documentos.palavras');
    }
}
