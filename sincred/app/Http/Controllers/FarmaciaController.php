<?php

namespace App\Http\Controllers;

use App\Farmacia;
use App\Responsavei;
use App\State;
use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    public function farmacia()
    {
        $farmacia = Farmacia::query();
        $farmacias = $farmacia->orderBy('razaoSocial')->get();
        $estado = State::query();
        $estados = $estado->orderBy('abbreviation')->get();
    	return view('farmacia.farmacia', ['farmacias'=>$farmacias, 'estados'=>$estados]);
    }
    public function busca(Request $request){
        $farmacia = Farmacia::query();
        if ($request->razaoSocial != null) {
            $farmacia->where('razaoSocial', 'like', '%'.$request->razaoSocial.'%');
        }
        if ($request->cnpj != null) {
            $farmacia->where('cnpj', $request->cnpj);
        }
        if ($request->states != null) {
            $farmacia->where('states_id', $request->states);
        }
        if ($request->city != null) {
            $farmacia->where('cities_id', $request->city);
        }
        $farmacias = $farmacia->orderBy('razaoSocial')->get();
        $estado = State::query();
        $estados = $estado->orderBy('abbreviation')->get();
        \Session::flash('encontradofarma', count($farmacias).' resultados encontrados. ');
        return view('farmacia.farmacia', ['farmacias' => $farmacias, 'estados'=>$estados]);
    }
    public function novo()
    {
        $estado = State::query();
        $estados = $estado->orderBy('abbreviation')->get();

        return view('farmacia.cadastrar', ['estados'=>$estados]);
    }
    public function farmacianovo(Request $request)
    {
        $farma = Farmacia::all();
        foreach ($farma as $farmas) {
            if ($farmas->cnpj == $request->cnpj) {
                \Session::flash('manoel', 'Farmacia ja cadastrada.');
                return redirect()->back();
            }
        }


        $farmacia = new Farmacia($request->all());
        $farmacia->save();
        return redirect()->route('/farmacias/{id}/responsavel', $farmacia->id);
    }
    public function responsavel($id)
    {
        $estado = State::query();
        $estados = $estado->orderBy('abbreviation')->get();
        $responsavel = Responsavei::query();
        $responsaveis = $responsavel->where('farmacias_id', $id)->orderBy('nome')->get();
        return view('farmacia.responsavel', ['id'=>$id,'estados'=> $estados, 'responsaveis'=>$responsaveis]);
    }
    public function responsavelNovo(Request $request)
    {   
        $respon = Responsavei::all();
        foreach ($respon as $respons) {
            if ($respons->cpf == $request->cpf) {
                \Session::flash('responerro', 'Responsável já cadastrado.');
                return redirect()->back();
            }
        }

        $responsavel = new Responsavei($request->all());
       
        return view('farmacia.responsavel');
        
    }
    public function excluirResponsavel($id){

        $responsavel = Responsavei::findOrFail($id);
        \Session::flash('excluirrespon', $responsavel->nome.' excluido com sucesso.');
        $responsavel->delete();
        return redirect()->back();
    }
}
