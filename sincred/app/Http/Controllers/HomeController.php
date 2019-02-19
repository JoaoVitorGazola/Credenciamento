<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

      public function lista()
    {
        return view('listarespon');
    }

     public function dadosfarm()
    {
        return view('dadosfarm');
    }
     public function editarfarm()
    {
        return view('editar-farm');
    }
}
