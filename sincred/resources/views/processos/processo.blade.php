@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                 <h2>Processos </h2></div>

                <div class="card-body">
                    @if (session('encontrado'))
                        <div class="alert alert-success" role="alert">
                            {{ session('encontrado') }}
                        </div>
                    @endif


                    <div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,.03);">
					  <div class="container">
					  	{!!Form::open(['url'=>'processos/busca'])!!}
					  	<div class="row col-12">
							
							<div class="col-lg-4 col-sm-4 col-md-4">
							<strong>{!! Form::label('nome', 'Nome') !!}</strong>
							{!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome do Processo']) !!}
							</div>
							
							<div class="col-sm-2 col-lg-2 col-md-2">
							<strong>{!! Form::label('inicio', 'Data Início') !!}</strong>

							{!! Form::date('inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000']) !!}
							</div>

							<div class="col-sm-2 col-lg-2 col-md-2">
							<strong>{!! Form::label('final', 'Data Final') !!}</strong>
							{!! Form::date('final', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000']) !!}


							</div>
							<div class="col-sm-3 col-lg-3 col-md-3">
							<strong>{!! Form::label('status', 'Status') !!}</strong>
							{!! Form::select('status', ['1'=> 'Aguardando', '2'=>'Em Andamento', '3'=>'Finalizado'], null, ['class'=>'form-control', 'placeholder' => 'Selecione']) !!}

							</div>
							<div class="col-sm-1 col-lg-1 col-md-1" style="margin-top: 30px;">
								
								<button type="submit" class="btn btn-primary btn-md" title="Pesquisar">
									Pesquisar <i class="fas fa-search"></i>
								</button>
							</div>

							{!! Form::close() !!}
                  	</div>

                  	<br>
              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              		<br>

								<div class="container">
			                  	<div class="row col-12">
                                    <button class="btn btn-primary btn-md"><a href="/processos/novo" style="text-decoration: none; color: #fff;" title="Novo Processo">Novo Registro</a> <i class="fas fa-plus-circle"></i> </button>

			                  	</div>
			                  </div>
					    
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
							      <th scope="col-6">Nome</th>
							      <th scope="col-6">Data Início</th>
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
							      <td>{{date('d/m/y', strtotime($processo->inicio))}}</td>
							      <td>{{date('d/m/y', strtotime($processo->final))}}</td>
							      <td>
									  <?php
									  if($processo->status == 1){

									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Aguardando">
									 <button class="btn btn-secondary btn-sm" style="pointer-events: none;" type="button">Aguardando</button>
									</span></td> <td>
				<a href="/processos/'.$processo->id.'/detalhes" class="btn btn-primary btn-sm">
				<i class="fas fa-info-circle" title="Detalhes"></i>
				</a>

				<a href="/processos/'.$processo->id.'/excluir" onclick="return confirm(\'Tem certeza que deseja excluir esse processo?\');" class="btn btn-danger btn-sm">
				<i class="fas fa-trash-alt" title="Excluir"></i>
				 </a>

							      </td>';
									  }
									  elseif($processo->status == 2){
									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Em Andamento">
									 <button class="btn btn-warning btn-sm" style="pointer-events: none;" type="button">Em Andamento</button>
									</span></td>							      <td>
				<a href="/processos/'.$processo->id.'/detalhes" class="btn btn-primary btn-sm">
				<i class="fas fa-info-circle" title="Detalhes"></i>
				</a>


							      </td>';
									  }
									  else{
									      echo '							      	<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Finalizado">
									 <button class="btn btn-success btn-sm" style="pointer-events: none;" type="button">Finalizado</button>
									</span></td>							      <td>
							      	<a href="/processos/'.$processo->id.'/verificar" class="btn btn-success btn-sm"> <i class="fas fa-check" title="Verificar"></i> </a>


							      </td>';
									  }
									  ?>


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