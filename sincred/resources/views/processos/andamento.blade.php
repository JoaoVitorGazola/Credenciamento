@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                 <h2>Processos em Andamento</h2></div>

                <div class="card-body">

                	@if (session('achado'))
                        <div class="alert alert-success" role="alert">
                            {{ session('achado') }}
                        </div>
                    @endif

                    <div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,.03);">
					  <div class="container">
					  	{!!Form::open(['url'=>'processos/andamento/busca'])!!}
					  	<div class="row col-12">
							
							<div class="col-lg-4 col-sm-4 col-md-4">
							<strong>{!! Form::label('nome', 'Nome') !!}</strong>
							{!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome do Processo']) !!}
							</div>
							

							<div class="col-sm-3 col-lg-3 col-md-3">
							<strong>{!! Form::label('final', 'Data Final') !!}</strong>
							{!! Form::date('final', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000']) !!}


							</div>
							
							<div class="col-sm-1 col-lg-1 col-md-1" style="margin-top: 30px;">
								<button type="submit" class="btn btn-primary btn-md">
									Pesquisar <i class="fas fa-search"></i>
								</button>
							</div>

							{!! Form::close() !!}
                  	</div>

                  	<br>
              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              		<br>

					    
					  </div>
					</div>

					
						<h2> Lista de Processos</h2>
						
              			<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> 
              			</li>
              			<br>

						<div class="table-responsive">
						<table class="table table-hover table-bordered"> 
							<thead style="background-color: rgba(0,0,0,.03); text-align: center;">
							    <tr>
							      <th scope="col-6">Nome do Processo</th>
							      <th scope="col-6">Descrição</th>
							      <th scope="col-6">Data Final</th>
							      <th scope="col-6">Status</th>
							      <th scope="col-6">Ação</th>
							    </tr>
							  </thead>
							  <!--- Tabela Aguardando --->
							@foreach($processos as $processo)
							  <tbody style="text-align: center;">
							    <tr>
							      <td scope="row">{{$processo->nome}}</td>
							      <td>{{$processo->descrição}}</td>
							      <td>{{date('d/m/y', strtotime($processo->final))}}</td>
							      <td> 
							      	<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Em Andamento">
									 <button class="btn btn-warning btn-sm" style="pointer-events: none;" type="button">Em Andamento</button>
									</span>
							      <td>

                                        <a href="{{url('/'.$processo->id.'/envios/novo')}}" class="btn btn-primary btn-sm" title="Enviar">
                                            <i class="fas fa-share-square"></i> </a>


                                    </td>


							    </tr>
							  
							  </tbody>
							@endforeach

						</table>
					</div>
					

                </div>
            </div>
        </div>
    </div>
</div>
@endsection