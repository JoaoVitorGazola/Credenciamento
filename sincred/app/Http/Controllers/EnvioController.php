<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Envio;
use App\Farmacia;
use App\Farmtoresp;
use App\Palavra;
use App\Processo;
use App\Responsavei;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Http\Request;
use Storage;
use Smalot\PdfParser\Parser;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;


class EnvioController extends Controller
{
    public function novo($id)
    {
        $processo = Processo::findOrFail($id);
        $farma = Farmtoresp::where('responsaveis_id', \Auth::user()->responsaveis_id);
    	$farmacias = Farmacia::query();
    	foreach ($farma as $farmacia){
    	    $farmacias = Farmacia::where('id', $farmacia->farmacias_id);
        }
        $farmacias->get();
        return view('envios.envio', ['processo'=>$processo, 'farmacias'=>$farmacias]);
    }

    public function relatorio($id)
    {
        $envio = Envio::findOrFail($id);
        $farmacia = Farmacia::findOrFail($envio->farmacias_id);
        $responsavel = Responsavei::findOrFail($envio->responsaveis_id);
        $text = file_get_contents(storage_path('app/public/'.$envio->pasta.'/relatorio.txt'));
        $text = nl2br($text);
        return view('processos.relatorio', ['envio'=>$envio, 'farmacia'=>$farmacia, 'responsavel'=>$responsavel, 'text'=>$text]);
    }



    public function salvar(Request $request, $id){
        $dirname = uniqid();
        $destination_path = storage_path('app/public/' . $dirname);
        $check = Farmtoresp::where([['farmacias_id', $request->farmacias_id], ['responsaveis_id', $request->responsaveis_id],])->orderBy('entrada', 'desc')->first();
        if($check->status == 1) {
            if (Envio::where([['farmacias_id', $request->farmacias_id], ['processos_id', $id],])->doesntExist()) {
                $envio = new Envio();
                $envio->processos_id = $id;
                $envio->obs = $request->obs;
                $envio->farmacias_id = $request->farmacias_id;
                $envio->responsaveis_id = $request->responsaveis_id;
                $envio->pasta = $dirname;
                $envio->save();
            } else {
                $env = Envio::query();
                $envio = $env->where([['farmacias_id', $request->farmacias_id], ['processos_id', $id],])->first();
                $pasta = $envio->pasta;
                Storage::disk('public')->deleteDirectory($pasta);
                $envio->update(['responsaveis_id' => $request->responsaveis_id, 'pasta' => $dirname, 'obs' => $request->obs]);
            }

            for ($i = 0; $i < count($request->file('file_name')); $i++) {
                $file = $request->file('file_name')[$i];
                $fileName = $file->getClientOriginalName();
                $file->move($destination_path, $fileName);
                if (pathinfo(storage_path($destination_path . '/' . $fileName), PATHINFO_EXTENSION) != "pdf") {
                    Storage::disk('public')->delete('/' . $dirname . '/' . $fileName);
                }
            }

            return redirect('processos/andamento');
        }
        else{
            \Session::flash('desativado', "Você não esta mais autorizado a realizar envios para esta farmácia");
            return redirect()->back();
        }
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
            $envio->save();
            if ($count < $documentosqtd) {
                fwrite($handle, "Algum documento está faltando, analise manual necesssária.\n\n");
                $envio->status = 0;
                $envio->save();
                return $envio->status;
            } else if($erro == 0){
                return $envio->status;
            }
            else{
                $envio->status = 0;
                $envio->save();
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
                fwrite($handle, "Arquivo não compativel, analise manual necessária.\n");
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
    public function download($id){
        $envio = Envio::findOrFail($id);
        $processo = Processo::findOrFail($envio->processos_id);
        $farmacia = Farmacia::findOrFail($envio->farmacias_id);
        self::createZip(storage_path('app/public/'.$envio->pasta));
        return response()->download(storage_path('app/public/'.$envio->pasta.'/arquivos.zip'), "Arquivos do processo:".$processo->nome." enviado por:".$farmacia->razaoSocial.".zip")->deleteFileAfterSend();
    }
    public function busca(Request $request){
        $processo = Processo::findOrFail($request->processo);
        $documentos = Documento::where('processos_id', $request->processo)->get();
        $farmacias = Farmacia::all();
        $envio = Envio::query();
        if($request->farmacia !=null){
            $envio->where('farmacias_id', $request->farmacia);
        }
        if($request->status !=null && $request->status != 3){
            $envio->where('status', $request->status);
        }
        if($request->status !=null && $request->status == 3){
            $envio->where('status', 0);
        }
        $envios = $envio->get();
        \Session::flash('envios', count($envios).' resultados encontrados. ');
        return view('processos.verificar', ['envios' => $envios, 'processo'=>$processo, 'documentos'=>$documentos, 'farmacias'=>$farmacias]);


    }
    public function aprovar($id){
        $envio = Envio::findOrFail($id);
        $envio->status = 2;
        $envio->save();

        \Session::flash('relatorio', 'Envio aprovado!');
        return redirect()->back();
    }
    public function reprovar($id){
        $envio = Envio::findOrFail($id);
        $envio->status = 1;
        $envio->save();

        \Session::flash('relatorio', 'Envio reprovado!');
        return redirect()->back();
    }
    public function createZip($path){
        $rootPath = realpath($path);
        $zip = new ZipArchive();
        $zip->open($path.'/arquivos.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            $path = pathinfo($file);
            if (!$file->isDir() && $path['extension']!= 'zip')
            {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
    }
}
