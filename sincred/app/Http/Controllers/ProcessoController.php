<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Farmacia;
use Illuminate\Http\Request;
use App\Processo;

class ProcessoController extends Controller
{
    public function index()
    {
        $this->atualizarStatus();
        $processo = Processo::query();
        $processos = $processo->orderBy('nome')->get();
        return view('processos.processo', ['processos' => $processos]);
    }
    public function busca(Request $request)
    {
        $this->atualizarStatus();
        $processo = Processo::query();
        if ($request->nome != null) {
            $processo->where('nome', 'like', '%'.$request->nome.'%');
        }
        if ($request->inicio != null) {
            $processo->where('inicio', $request->inicio);
        }
        if ($request->final !=null) {
            $processo->where('final', $request->final);
        }
        if ($request->status != null) {
            $processo->where('status', $request->status);
        }
        $processos = $processo->orderBy('nome')->get();
        \Session::flash('encontrado', count($processos).' resultados encontrados ');
        return view('processos.processo', ['processos' => $processos]);

    }
    public function detalhes($id){
        $this->atualizarStatus();
        $processo = Processo::findOrFail($id);
        $documentos = Documento::where('processos_id', $id)->orderBy('tipo')->get();
        return view('processos.detalhes', ['processo' => $processo, 'documentos' => $documentos]);
    }
    public function excluir($id){

        $processo = Processo::findOrFail($id);
        \Session::flash('encontrado', $processo->nome.' excluido com sucesso');
        $processo->delete();
        return redirect('/processos');
    }
    public function editarProcesso(){

        return view('processos.editarprocesso');
    }

    public function verificar($id){
        $this->atualizarStatus();
        $processo = Processo::findOrFail($id);
        $documentos = Documento::where('processos_id', $id)->get();
        $farmacias = Farmacia::all();
        $envio = Envio::query();
        $envios = $envio->where('processos_id', $id)->get();
        return view('processos.verificar', ['processo' => $processo, 'documentos' => $documentos, 'farmacias'=>$farmacias, 'envios'=>$envios]);
    }

    public function novo()
    {
        return view('processos.cadastrar');
    }
    public function salvar(Request $request){
        $processo = new Processo();
        $processo->nome = $request->nome;
        $processo->descrição = $request->descrição;
        $processo->inicio = implode("-",array_reverse(explode("/",$request->inicio)));
        $processo->final = implode("-",array_reverse(explode("/",$request->final)));
        $processo->status = 1;
        $processo->save();
        $this->atualizarStatus();
        return redirect()->route('/{id}/documentos/novo', $processo->id);
    }

    public function andamento(Request $request)
    {
        $this->atualizarStatus();
        $processo = Processo::query();
        $processos = $processo->where('status', 2)->orderBy('nome')->get();
        return view('processos.andamento', ['processos' => $processos]);
    }

    public function buscaAndamento(Request $request)
    {
        $this->atualizarStatus();
        $processo = Processo::query();
        if ($request->nome != null) {
            $processo->where('nome', 'like', '%'.$request->nome.'%');
        }

        if ($request->final !=null) {
            $processo->where('final', $request->final);
        }

        $processos = $processo->where('status', 2)->orderBy('nome')->get();

        \Session::flash('achado', count($processos).' resultados encontrados ');
        return view('processos.andamento', ['processos' => $processos]);

    }
    public function atualizarStatus(){
        $processos = Processo::all();
        $today = new \DateTime("now");
        foreach ($processos as $processo){
            $inicio = new \DateTime($processo->inicio);
            $final = new \DateTime($processo->final);
            if($today < $inicio){
                $processo->status = 1;
                $processo->save();
            }
            else{
                if($final >= $today){
                    $processo->status = 2;
                    $processo->save();
                }
                else{
                    $processo->status = 3;
                    $processo->save();
                }
            }
        }
    }

}
