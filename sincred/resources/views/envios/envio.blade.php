@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2>Processo: {{$processo->nome}}</h2>
                	<br>
                   
                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                <li class="active nav-link">
                            
                                     
                                   <i class="fas fa-share-square"></i> 
                                    Envio 
                            
                                </li>
                                
                          
                            </ul>
                        </div>
            
                     </div>

                </div>

                <div class="card-body">
                    @if (session('desativado'))
                        <div class="alert alert-success" role="alert">
                            {{ session('desativado') }}
                        </div>
                    @endif

                   

                    <div class="alert alert-primary" role="alert">
                              Os campos marcados com * são de preenchimento obrigatório.
                            </div>
                            <br>    
                    <h2> Dados do Envio </h2>
                    
                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/'.$processo->id.'/envios/novo/salvar', 'files'=>'true'])!!}
                        <div class="row">
                            
                            <div class="col-lg-3 col-sm-3 col-md-3">
                            <strong> {!! Form::label('farmacias_id', 'Farmácia *') !!}
                             </strong>
                            <select name="farmacias_id" class="form-control" id="farmacias_id" required>
                                <option value="{{null}}">Selecione a farmacia</option>
                                @foreach($farmacias as $farmacia)
                                    <option value="{{$farmacia->id}}">{{$farmacia->razaoSocial}}</option>
                                    @endforeach
                            </select>
                                {{csrf_field(['id'=>'token'])}}
                            </div>
                            
                            <div class="col-sm-3 col-lg-3 col-md-3">
                            <strong>{!! Form::label('responsaveis_id', 'Responsável *') !!}
                            </strong>
                                <select name="responsaveis_id" id="responsaveis_id" class="form-control" required>
                                    <option value="{{Auth::user()->responsaveis_id}}"><?php $responsavel = \App\Responsavei::findOrFail(Auth::user()->responsaveis_id); echo $responsavel->nome?></option>
                                </select>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-md-6">
                             <strong> {!! Form::label('obs', 'Observações') !!}</strong>
                            {!! Form::input('text', 'obs', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Observações']) !!}

							<br>
                            </div>




                     </div>
                     <br>
                    <h2> Documentos a serem enviados</h2>
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>

                     <div class="table-responsive">
						<table class="table table-hover table-bordered"> 
							<thead style="background-color: rgba(0,0,0,.03); text-align: center;">
							    <tr>
							      <th scope="col-6" style="width: 200px;">Tipo do Documento</th>
							      <th scope="col-6">Descrição</th>
							     
							      
							      <th scope="col-6">Orientações</th>
							    </tr>
							  </thead>
							 <?php
                                $documentos = \App\Documento::where('processos_id', $processo->id)->get();
                                foreach ($documentos as $documento){
                            ?>
							  <tbody style="text-align: center;">
							    <tr>
							      <td scope="row"> {{$documento->tipo}}</td>
							      <td>{{$documento->descrição}}</td>
							      <td>
                                     O arquivo referente a este documento deve estar nomeado como <u>{{$documento->tipo}}.pdf</u>, arquivos com nome ou extensão diferentes serão desconsiderados.
                                  </td>
							      


							    </tr>
							  
							  </tbody>
							<?php
							}
							?>

						</table>
					</div>
                    	<br>
                        {!! Form::file('file_name[]', ['multiple', 'accept'=>".pdf", 'class'=>'col-6 form-control form-control-file', 'required', 'min'=>count($documentos)]) !!}

                        <br>
                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                        <br>

                        <div class="float-right">

                            <button class="btn btn-primary"><a href="/processos/andamento" style="color: #fff; text-decoration: none;">Cancelar</a>
                            </button>

                            <button type="submit" class="btn btn-primary"><a style="color: #fff; text-decoration: none;">Enviar
                            </a>
                            </button>

							

                            {!! Form::close() !!}


							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection