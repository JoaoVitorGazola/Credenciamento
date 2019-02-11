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
Route::any('/processos', 'ProcessoController@index')->middleware('auth:fiscal');
Route::post('/processos/busca', 'ProcessoController@busca')->middleware('auth:fiscal');
Route::any('/processos/{Processo}/detalhes', 'ProcessoController@detalhes')->middleware('auth:fiscal');
Route::any('/processos/{Processo}/excluir', 'ProcessoController@excluir')->middleware('auth:fiscal');
Route::any('/processos/{Processo}/verificar', 'ProcessoController@verificar')->middleware('auth:fiscal');
Route::any('/processos/novo', 'ProcessoController@novo')->middleware('auth:fiscal');
Route::any('/processos/novo/salvar', 'ProcessoController@salvar')->middleware('auth:fiscal');
Route::any('/processos/{Processo}/editar-processo', 'ProcessoController@editarProcesso')->middleware('auth:fiscal');
Route::patch('/processos/{Processo}', 'ProcessoController@atualizar')->middleware('auth:fiscal');


Route::any('/{id}/documentos/novo', 'DocumentoController@novo')->name('/{id}/documentos/novo')->middleware('auth:fiscal');
Route::any('/{id}/documentos/novo/salvar', 'DocumentoController@salvar')->middleware('auth:fiscal');
Route::any('/documentos/editar-doc', 'DocumentoController@editarDoc')->middleware('auth:fiscal');
Route::any('/documentos/{Documento}/excluir', 'DocumentoController@excluir')->middleware('auth:fiscal');
Route::any('{id}/documentos/palavras', 'DocumentoController@palavras')->middleware('auth:fiscal');
Route::any('/documentos/editar-palavras', 'DocumentoController@editarPalavra')->middleware('auth:fiscal');
Route::any('{id}/documentos/palavras/salvar', 'DocumentoController@palavrassalvar')->middleware('auth:fiscal');
Route::any('/documentos/palavras/{Palavra}/excluir', 'DocumentoController@excluirPalavra')->middleware('auth:fiscal');

Route::get('farmacias/fetch', 'CidadeController@fetch');
Route::any('/farmacias', 'FarmaciaController@farmacia')->middleware('auth:fiscal');
Route::post('/farmacias/busca', 'FarmaciaController@busca')->middleware('auth:fiscal');
Route::any('/farmacias/novo', 'FarmaciaController@novo')->middleware('auth:fiscal');
Route::any('/farmacias/novo/salvar', 'FarmaciaController@farmacianovo')->middleware('auth:fiscal');
Route::any('/farmacias/{id}/responsavel', 'FarmaciaController@responsavel')->name('/farmacias/{id}/responsavel')->middleware('auth:fiscal');
Route::any('/farmacias/responsavel/novo', 'FarmaciaController@responsavelnovo');
Route::any('/farmacias/{id}/excluir', 'FarmaciaController@excluirResponsavel')->middleware('auth:fiscal');



Route::any('{id}/envios/novo', 'EnvioController@novo');
Route::get('envios/fetch', 'EnvioController@fetch');
Route::any('{id}/envios/novo/salvar', 'EnvioController@salvar');
Route::any('/envios/busca', 'EnvioController@busca')->middleware('auth:fiscal');
Route::any('envios/relatorio/{Envio}', 'EnvioController@relatorio')->middleware('auth:fiscal');
Route::any('envios/relatorio/{Envio}/download', 'EnvioController@download')->middleware('auth:fiscal');
Route::any('envios/relatorio/{Envio}/reprovar', 'EnvioController@reprovar')->middleware('auth:fiscal');
Route::any('envios/relatorio/{Envio}/aprovar', 'EnvioController@aprovar')->middleware('auth:fiscal');
