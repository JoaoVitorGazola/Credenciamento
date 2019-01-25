<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function novo()
    {
    	return view('envios.envio');
    }
}
