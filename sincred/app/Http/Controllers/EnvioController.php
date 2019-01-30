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
        $documentos = $doc->where('processos_id', $envio->processos_id)->get();
        $files = Storage::disk('public')->allFiles('/'.$envio->pasta);
        $count = 0;
        $documentosqtd = 0;
        foreach ($documentos as $documento){
            foreach ($files as $file){
                $path = pathinfo($file);
                if($documento->tipo == $path['filename']){
                    $count++;
                    $relatorio = self::geraRelatorio($file, $documento, $envio->pasta);
                }
            }
            $documentosqtd++;
        }
        if($count<$documentosqtd){
            return 0;
        }
        else{

        }
        return $count;
    }

    public static function geraRelatorio($file, $documento, $pasta){
        $handle = fopen(storage_path('app/public/'.$pasta.'/relatorio.txt'), 'a');
        fwrite($handle, "Resultado de ".$documento->tipo.":\n");
        $pal = Palavra::query();
        $palavras = $pal->where('documentos_id', $documento->id)->get();
        $relatorio = "";
        $check = 0;
        foreach ($palavras as $palavra){
            $count = self::conta($file, $palavra);
            $relatorio .= $palavra->palavra." encontrada ".$count."vezes, esperado: ".$palavra->quantidade;
            if($count < $palavra->quantidade){
                $relatorio .= " Reprovado\n";
                $check = -1;
            }
            else{
                $relatorio .= " Aprovado\n";
            }
        }
        return;
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
