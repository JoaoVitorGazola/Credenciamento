<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lista-responsaveis', 'HomeController@lista');
Route::any('/processos/andamento', 'ProcessoController@andamento');
Route::any('/processos/andamento/busca', 'ProcessoController@buscaAndamento');
Route::any('/processos', 'ProcessoController@index');
Route::post('/processos/busca', 'ProcessoController@busca');
Route::any('/processos/{Processo}/detalhes', 'ProcessoController@detalhes');
Route::any('/processos/{Processo}/excluir', 'ProcessoController@excluir');
Route::any('/processos/{Processo}/verificar', 'ProcessoController@verificar');
Route::any('/processos/novo', 'ProcessoController@novo');
Route::any('/processos/novo/salvar', 'ProcessoController@salvar');
Route::any('/processos/{Processo}/editar-processo', 'ProcessoController@editarProcesso');
Route::patch('/processos/{Processo}', 'ProcessoController@atualizar');


Route::any('/{id}/documentos/novo', 'DocumentoController@novo')->name('/{id}/documentos/novo');
Route::any('/{id}/documentos/novo/salvar', 'DocumentoController@salvar');
Route::any('/documentos/editar-doc', 'DocumentoController@editarDoc');
Route::any('/documentos/{Documento}/excluir', 'DocumentoController@excluir');
Route::any('{id}/documentos/palavras', 'DocumentoController@palavras');
Route::any('/documentos/editar-palavras', 'DocumentoController@editarPalavra');
Route::any('{id}/documentos/palavras/salvar', 'DocumentoController@palavrassalvar');
Route::any('/documentos/palavras/{Palavra}/excluir', 'DocumentoController@excluirPalavra');

Route::get('farmacias/fetch', 'CidadeController@fetch');
Route::any('/farmacias', 'FarmaciaController@farmacia');
Route::post('/farmacias/busca', 'FarmaciaController@busca');
Route::any('/farmacias/novo', 'FarmaciaController@novo');
Route::any('/farmacias/novo/salvar', 'FarmaciaController@farmacianovo');
Route::any('/farmacias/responsavel/', 'FarmaciaController@responsavel');
Route::any('/farmacias/{id}/excluir', 'FarmaciaController@excluirResponsavel');



Route::any('{id}/envios/novo', 'EnvioController@novo');
Route::get('envios/fetch', 'EnvioController@fetch');
Route::any('{id}/envios/novo/salvar', 'EnvioController@salvar');
Route::any('/envios/busca', 'EnvioController@busca');
Route::any('envios/relatorio/{Envio}', 'EnvioController@relatorio');
Route::any('envios/relatorio/{Envio}/download', 'EnvioController@download');
Route::any('envios/relatorio/{Envio}/reprovar', 'EnvioController@reprovar');
Route::any('envios/relatorio/{Envio}/aprovar', 'EnvioController@aprovar');




Route::any('/lista-responsavel', 'FarmaciaController@listarespon');
Route::get('/dados/farm', 'HomeController@dadosfarm');
Route::get('/editar-farm', 'HomeController@editarfarm');