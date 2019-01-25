<?php

namespace App\Http\Controllers;

use App\Citie;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function fetch(Request $request){
        $value = $request->get('value');
        $data = Citie::query();
        $cidades = $data->where('state_id', $value)->orderBy('name')->get();
        $output = "<option value='".null."'>Selecione a cidade</option>";
        foreach ($cidades as $cidade){
            $output .= '<option value="'.$cidade->id.'">'.$cidade->name.'</option>';
        }
        echo $output;
    }
}
