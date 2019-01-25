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

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/processos', 'ProcessoController@index');
Route::post('/processos/busca', 'ProcessoController@busca');
Route::any('/processos/{Processo}/detalhes', 'ProcessoController@detalhes');
Route::any('/processos/{Processo}/excluir', 'ProcessoController@excluir');
Route::any('/processos/{Processo}/verificar', 'ProcessoController@verificar');
Route::any('/processos/{Processo}/verificar/{Envio}', 'ProcessoController@verificar');
Route::any('/processos/novo', 'ProcessoController@novo');


Route::any('/documentos/novo', 'DocumentoController@novo');
Route::any('/documentos/palavras', 'DocumentoController@palavras');

Route::any('/farmacias', 'FarmaciaController@farmacia');
Route::get('farmacias/fetch', 'CidadeController@fetch');
Route::post('/farmacias/busca', 'FarmaciaController@busca');
Route::any('/farmacias/novo', 'FarmaciaController@novo');
Route::any('/farmacias/novo/salvar', 'FarmaciaController@farmacianovo');
Route::any('/farmacias/{id}/responsavel', 'FarmaciaController@responsavel')->name('/farmacias/{id}/responsavel');
Route::any('/farmacias/responsavel/novo', 'FarmaciaController@responsavelnovo');

