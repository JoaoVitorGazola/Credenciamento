<?php

namespace App\Http\Controllers;

use App\Farmacia;
use App\Farmtoresp;
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
            if ($farmas->email == $request->email) {
                \Session::flash('manoel', 'Email ja cadastrado.');
                return redirect()->back();
            }
        }


        $farmacia = new Farmacia();
        $farmacia->razaoSocial = $request->razaoSocial;
        $farmacia->cnpj = $request->cnpj;
        $farmacia->cep = $request->cep;
        $farmacia->email = $request->email;
        $farmacia->fixo = $request->fixo;
        $farmacia->celular = $request->celular;
        $farmacia->logradouro = $request->logradouro;
        $farmacia->bairro = $request->bairro;
        $farmacia->numero = $request->numero;
        $farmacia->complemento = $request->complemento;
        $farmacia->states_id = $request->states_id;
        $farmacia->cities_id = $request->cities_id;
        $farmacia->save();
        $senha = UserController::criarFarmacia($request, $farmacia->id);
        \Session::flash('manoel', $senha);
        return redirect()->back();
    }
    public function responsavel($id)
    {
        $estado = State::query();
        $estados = $estado->orderBy('abbreviation')->get();
        $farma = Farmtoresp::where('farmacias_id', $id)->get();
        $responsavel = Responsavei::query();
        foreach ($farma as $f) {
            $responsavel = $responsavel->where('id', $f->responsaveis_id);
        }
        $responsaveis = $responsavel->orderBy('nome')->get();
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
            if ($respons->email == $request->email) {
                \Session::flash('responerro', 'Email já cadastrado.');
                return redirect()->back();
            }
        }

        $responsavel = new Responsavei($request->all());
        $responsavel->save();
        $senha = UserController::criarResponsavel($request, $responsavel->id);

        \Session::flash('responerro', $senha);
        $farm = new Farmtoresp();
        $farm->responsaveis_id = $responsavel->id;
        $farm->farmacias_id = \Auth::user()->farmacias_id;
        $today =  new \DateTime("today");
        $farm->entrada =implode("-",array_reverse(explode("/",$today)));
        $farm->save();
        return view('farmacia.responsavel');
        
    }

    public function listarespon()
    {
        return view('listarespon');
    }
}
