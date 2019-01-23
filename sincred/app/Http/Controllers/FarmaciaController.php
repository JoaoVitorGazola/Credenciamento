<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    public function farmacia()
    {
    	return view('farmacia.farmacia');
    }
}
