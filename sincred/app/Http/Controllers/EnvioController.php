<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Envio;
use App\Farmacia;
use App\Palavra;
use App\Processo;
use App\Responsavei;
use Illuminate\Http\Request;
use Storage;
use Smalot\PdfParser\Parser;

class EnvioController extends Controller
{
    public function novo($id)
    {
        $processo = Processo::findOrFail($id);
        $farmacias = Farmacia::all();
    	return view('envios.envio', ['processo'=>$processo, 'farmacias'=>$farmacias]);
    }

    public function relatorio()
    {
        return view('processos.relatorio');
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
        $destination_path = storage_path('app/public/' . $dirname);
        if (Envio::where([['farmacias_id', $request->farmacias_id], ['processos_id', $id],])->doesntExist()) {
            $envio = new Envio();
            $envio->processos_id = $id;
            $envio->obs = $request->obs;
            $envio->farmacias_id = $request->farmacias_id;
            $envio->responsaveis_id = $request->responsaveis_id;
            $envio->pasta = $dirname;
            $envio->save();
        }
        else{
            $env = Envio::query();
            $envio = $env->where([['farmacias_id', $request->farmacias_id], ['processos_id', $id],])->first();
            $pasta = $envio->pasta;
            Storage::disk('public')->deleteDirectory($pasta);
            $envio->update(['responsaveis_id'=>$request->responsaveis_id, 'pasta'=>$dirname, 'obs'=>$request->obs]);
        }

        for($i=0; $i<count($request->file('file_name'));$i++) {
            $file = $request->file('file_name')[$i];
                $fileName = $file->getClientOriginalName();
                $file->move($destination_path, $fileName);
                if(pathinfo(storage_path($destination_path.'/'.$fileName), PATHINFO_EXTENSION) != "pdf"){
                    Storage::disk('public')->delete('/'.$dirname.'/'.$fileName);
                }
            }

         return redirect('processos/andamento');
    }
    public static function checar($id){
        $envio = Envio::findOrFail($id);
        $newPath = storage_path('app/public/'.$envio->pasta.'/relatorio.txt');
        if(!file_exists($newPath)) {
            $doc = Documento::query();
            $documentos = $doc->where('processos_id', $envio->processos_id)->get();
            $files = Storage::disk('public')->allFiles('/'.$envio->pasta);
            $count = 0;
            $documentosqtd = 0;
            $erro = 0;
            $handle = fopen(storage_path('app/public/' . $envio->pasta . '/relatorio.txt'), 'w');
            foreach ($documentos as $documento) {
                foreach ($files as $file) {
                    $path = pathinfo($file);
                    if ($documento->tipo == $path['filename']) {
                        $count++;
                        $check = 0;
                        if($envio->status ==1){
                            $check = 1;
                        }
                        $envio->status = self::geraRelatorio($file, $documento, $handle);
                        if($envio->status == 0){
                            $erro = 1;
                        }
                        if($check==1){
                            $envio->status = 1;
                        }
                    }
                }
                $documentosqtd++;
            }
            if ($count < $documentosqtd) {
                fwrite($handle, "Algum documento está faltando, analise manual necessária\n\n");
                $envio->status = 0;

                return $envio->status;
            } else if($erro == 0){
                return $envio->status;
            }
            else{
                $envio->status = 0;
                return $envio->status;
            }
        }
        else {
            return $envio->status;
        }
    }

    public static function geraRelatorio($file, $documento, $handle){
        fwrite($handle, "Resultado de ".$documento->tipo.":\n");
        $pal = Palavra::query();
        $palavras = $pal->where('documentos_id', $documento->id)->orderBy('palavra')->get();

        $check = 2;
        foreach ($palavras as $palavra) {
            $relatorio = "";
            $count = self::conta($file, $palavra->palavra);
            if ($count == -1 && $check!=0) {
                fwrite($handle, "Arquivo não compativel, analise manual necessária\n");
                $check = 0;
            }
            if ($check != 0) {
                $relatorio .= '"'.$palavra->palavra . '" encontrada ' . $count . " vez(es), esperado: " . $palavra->quantidade. ". Status:";
                if ($count < $palavra->quantidade) {
                    $relatorio .= " Reprovado\n";
                    $check = 1;
                } else {
                    $relatorio .= " Aprovado\n";
                }
                fwrite($handle, $relatorio);
            }
        }
        fwrite($handle, "\n");
        return $check;
    }
    public static function conta($path, $palavra){
        $file = \Storage::disk('public')->path($path);
        $result = 0;
        $parser = new Parser();
        $palavra = str_replace(' ', '', strtolower($palavra));
        try {
            $pdf = $parser->parseFile($file);
            $text = $pdf->getText();
            $text = str_replace(' ', '', strtolower($text));
            $result += substr_count($text, $palavra);
            return $result;
        }catch (\Exception $exception)
        {
            return -1;
        }
    }
}
