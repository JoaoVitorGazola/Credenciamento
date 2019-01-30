<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Envio;
use App\Farmacia;
use App\Processo;
use App\Responsavei;
use Illuminate\Http\Request;
use Storage;

class EnvioController extends Controller
{
    public function novo($id)
    {
        $processo = Processo::findOrFail($id);
        $farmacias = Farmacia::all();
    	return view('envios.envio', ['processo'=>$processo, 'farmacias'=>$farmacias]);
    }
    public function fetch(Request $request){
        $value = $request->get('value');
        $data = Responsavei::query();
        $responsaveis = $data->where('farmacias_id', $value)->orderBy('nome')->get();
        $output = "<option value='".null."'>Selecione o responsavel</option>";
        foreach ($responsaveis as $responsavel){
            $output .= '<option value="'.$responsavel->id.'">'.$responsavel->nome.'</option>';
        }
        echo $output;
    }
    public function salvar(Request $request, $id){
        $dirname = uniqid();
        for($i=0; $i<count($request->file('file_name'));$i++){
            $file=$request->file('file_name')[$i];
            $destination_path= storage_path('app/public/'.$dirname);
            $fileName = $file->getClientOriginalName();
            $file->move($destination_path,$fileName);
        }
        $envio = new Envio();
        $envio->processos_id = $id;
        $envio->farmacias_id = $request->farmacias_id;
        $envio->responsaveis_id = $request->responsaveis_id;
        $envio->pasta = $dirname;
        $envio->save();

        return redirect('processos/andamento');
    }
    public static function checar($id){
        $envio = Envio::findOrFail($id);
        $doc = Documento::query();
        $documentos = $doc->where('processos_id', $envio->processos_id);
        $files = Storage::disk('public')->allFiles('/'.$envio->pasta);
        $count = 0;
        foreach ($documentos as $documento){
            foreach($files as $file){
                $path = pathinfo($file);
                if($documento->tipo == $path['filename']){
                    $count++;
                }
            }
        }
        return $count;
    }
}
