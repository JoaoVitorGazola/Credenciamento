<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessoController extends Controller
{
	 public function index()
    {	
    	return view('processos.processo');
    }

     public function detalhes()
    {	
    	return view('processos.detalhe');
    }
   
  
}
