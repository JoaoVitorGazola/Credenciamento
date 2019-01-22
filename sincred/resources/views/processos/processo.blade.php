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
					  	<div class="row">
							
							<div class="col-lg-3 col-sm-3 col-md-3">
							<strong>{!! Form::label('nome', 'Nome') !!}</strong>
							{!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome do Processo']) !!}
							</div>
							
							<div class="col-sm-2 col-lg-2 col-md-2">
								{!! Form::label('inicio', 'Data Início') !!}

							{!! Form::date('inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000']) !!}
							</div>

							<div class="col-sm-2 col-lg-2 col-md-2">
								{!! Form::label('final', 'Data Final') !!}
							{!! Form::date('final', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000']) !!}


							</div>
							<div class="col-sm-2 col-lg-2 col-md-2">
								{!! Form::label('status', 'Status') !!}
							{!! Form::select('status', ['1'=> 'Aguardando', '2'=>'Em Andamento', '3'=>'Finalizado'], null, ['class'=>'form-control', 'placeholder' => 'Selecione']) !!}

							</div>
							<div class="col-sm-1 col-lg-1 col-md-1" style="margin-top: 30px;">
								{!! Form::submit('Pesquisar', ['class'=>'btn btn-primary']) !!}
							</div>

							{!! Form::close() !!}
                  	</div>

                  	<br>
              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              		<br>

								<div class="container">
			                  	<div class="row">
                                    <button class="btn btn-primary"><a href="/processos/novo" style="text-decoration: none; color: #fff;">Novo registro</a> </button>

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
							<thead style="background-color: rgba(0,0,0,.03);">
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
							  <tbody>
							    <tr>
							      <td scope="row">{{$processo->nome}}</td>
							      <td>{{date('d/m/y', strtotime($processo->inicio))}}</td>
							      <td>{{date('d/m/y', strtotime($processo->final))}}</td>
							      <td>
									  <?php
									  if($processo->status == 1){

									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-secondary" style="pointer-events: none;" type="button">Aguardando</button>
									</span></td> <td>
							      	<button> <a href="/processos/'.$processo->id.'/detalhes"> Detalhes </a></button>
							      	<button> <a href="/processos/'.$processo->id.'/excluir" onclick="return confirm(\'Tem certeza que deseja excluir esse processo?\');"> Excluir </a></button>

							      </td>';
									  }
									  elseif($processo->status == 2){
									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-warning" style="pointer-events: none;" type="button">Em Andamento</button>
									</span></td>							      <td>
							      	<button> <a href="/processos/'.$processo->id.'/detalhes"> Detalhes </a></button>


							      </td>';
									  }
									  else{
									      echo '							      	<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-success" style="pointer-events: none;" type="button">Finalizado</button>
									</span></td>							      <td>
							      	<button> <a href="/processos/'.$processo->id.'/verificar"> Verificar </a></button>


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