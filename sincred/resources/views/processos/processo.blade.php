@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2>Processos </h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,.03);">
					  <div class="container">
					  	<div class="row"> 
					  		<div class="col-lg-4 col-sm-4 col-md-4">

							  	<strong>
							    
							    {{ Form::label('nome', 'Nome') }}
								</strong>
		                 		{{ Form::input('text', 'tipodoc', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Nome do Processo']) }}


		                 		</div>
		                 		<div class="col-lg-2 col-sm-2 col-md-2">

							  	<strong>
							    
							    {{ Form::label('dataini', 'Data Início') }}
								</strong>
		                 		{{ Form::input('text', 'tipodoc', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => '00/00/0000']) }}

		                 		
		                 		</div>
		                 		<div class="col-lg-2 col-sm-2 col-md-2">

							  	<strong>
							    
							    {{ Form::label('dataend', 'Data Final') }}
								</strong>
		                 		{{ Form::input('text', 'tipodoc', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => '00/00/0000']) }}

		                 		
		                 		</div>
		                 		<div class="col-lg-2 col-sm-2 col-md-2">

							  	<strong>
							    
							    {{ Form::label('status', 'Status') }}
								</strong>
		                 		<select class="form-control">
		                 		  <option>Selecione </option>
								  <option> Aguardando </option>
								  <option > Em Andamento </option>
								  <option >Finalizado </option>
								 
								</select>

		                 		
		                 		</div>

		                 		<div class="col-lg-2 col-sm-2 col-md-2" style="margin-top: 30px;">

							  	{!! Form::submit('Pesquisar', ['class'=>'btn btn-primary']) !!}
		                 		
		                 		</div>

		                  		
                  	</div>

                  	<br>
              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              		<br>

								<div class="container">
			                  	<div class="row">

			                  		{!! Form::submit('Novo Registo', ['class'=>'btn btn-primary']) !!}
			                  	</div>
			                  </div>
					    
					  </div>
					</div>

					<div class="card-header">
						<h2> Lista de Processos</h2>
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
							      <th scope="row">{{$processo->nome}}</th>
							      <td>{{date('d/m/y', strtotime($processo->inicio))}}</td>
							      <td>{{date('d/m/y', strtotime($processo->final))}}</td>
							      <td>
									  <?php
									  if($processo->status == 1){

									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-secondary" style="pointer-events: none;" type="button">Aguardando</button>
									</span></td> <td>
							      	<button> <a href="processos/'.$processo->id.'/detalhes"> Detalhes </a></button>
							      	<button> <a href="#"> Excluir </a></button>

							      </td>';
									  }
									  elseif($processo->status == 2){
									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-warning" style="pointer-events: none;" type="button">Em Andamento</button>
									</span></td>							      <td>
							      	<button> <a href="processos/'.$processo->id.'/detalhes"> Detalhes </a></button>


							      </td>';
									  }
									  else{
									      echo '							      	<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-success" style="pointer-events: none;" type="button">Finalizado</button>
									</span></td>							      <td>
							      	<button> <a href="processos/'.$processo->id.'/verificar"> Verificar </a></button>


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
</div>
@endsection