@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2> Verificar Processo </h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                  
						<h2> Processo </h2> 

						<br>
              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              			<br>

						<div class="table-responsive">
						<table class="table table-hover table-bordered" style="text-align: center;"> 
							<thead style="background-color: rgba(0,0,0,.03);">
							    <tr>
							      <th scope="col-6">Nome</th>
							      <th scope="col-6">Data Início</th>
							      <th scope="col-6">Data Final</th>
							      <th scope="col-6">Status</th>
							     
							    </tr>
							  </thead>
							  <!--- Tabela Aguardando --->
							  <tbody>
							    <tr>
							      <td>{{$processo->nome}}</td>
							      <td>{{date('d/m/y', strtotime($processo->inicio))}}</td>
							      <td>{{date('d/m/y', strtotime($processo->final))}}</td>
							      <td>
									  <?php
									  if($processo->status == 1){
									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-secondary" style="pointer-events: none;" type="button">Aguardando</button>
									</span>';
									  }
									  elseif($processo->status == 2){
									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-warning" style="pointer-events: none;" type="button">Em Andamento</button>
									</span>';
									  }
									  else{
									      echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									 <button class="btn btn-success" style="pointer-events: none;" type="button">Finalizado</button>
									</span>';
									  }
									  ?>

							      </td>
							      
							    </tr>
							  
							  </tbody>

							  
						</table>
					</div>

					<br>

					<h2> Documentos do Processo </h2> 

						<br>
              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              		<br>
						<div class="table-responsive">
							<table class="table table-hover table-bordered" style="text-align: center;"> 
								<thead style="background-color: rgba(0,0,0,.03);">
								    <tr>
								      <th scope="col-6">Tipo do Documento</th>
								      <th scope="col-6">Detalhe</th>
								      							     
								    </tr>
							  </thead>
							  
							 @foreach($documentos as $documento)
							  <tbody>
								    <tr>
								      <td> {{$documento->tipo}} </td>
								      <td> {{$documento->descrição}} </td>


								    </tr>

							  </tbody>
							@endforeach

							  
						</table>
					</div>

					<h2> Envios </h2> 

              		<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              		<br>

					<div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,.03);">
					  <div class="container">
					  	<div class="row"> 
					  		<div class="col-lg-4 col-sm-4 col-md-4">

							  	<strong>
							    
							    {{ Form::label('farm', 'Farmácia') }}
								</strong>
		                 		{{ Form::select('farm', ['e1'=> 'exemplo1', 'e2'=>' exemplo2', 'e3'=>'exemplo3'], null, ['class'=>'form-control', 'placeholder' => 'Selecione']) }}

		                 		
		                 		</div>
		                 		<div class="col-lg-3 col-sm-3 col-md-3">

							  	<strong>
							    
							    {{ Form::label('status', 'Status') }}
								</strong>
		                 		{{ Form::select('status', ['e1'=> 'Aprovado', 'e2'=>'Reprovado', 'e3'=>'Erro'], null, ['class'=>'form-control', 'placeholder' => 'Selecione']) }}

		                 		
		                 		</div>
		                 		<div class="col-lg-2 col-sm-2 col-md-2" style="margin-top: 30px;">

							  	{!! Form::submit('Pesquisar', ['class'=>'btn btn-primary']) !!}
		                 		
		                 		</div>
		                  		
                  		</div>

                  		<br>
	              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
	              		<br>
					    
					  </div>
					</div>


					<!-- -->

					
						
						<div class="table-responsive">
						<table class="table table-hover table-bordered"> 
							<thead style="background-color: rgba(0,0,0,.03);">
							    <tr>
							      <th scope="col-6">Farmácia</th>
							      <th scope="col-6">Responsável</th>
							      <th scope="col-6">Status</th>
							      <th scope="col-6">Ação</th>
							    </tr>
							  </thead>
							  <!--- Tabela Aguardando --->
							
							  <tbody>
							    <tr>
							      <td scope="row"> exemple</td>
							      <td> exemple</td>
							      
							      <td>Aprovado, Reprovado, erro </td>
									
									<td>
										<button> 
											<a href="#"> Verificar</a> 
											
										</button>
									</td>	

							    </tr>
							  
							  </tbody>
						

						</table>
					</div>
					

					<br>	
						<div class="float-right">
							<button class="btn btn-primary"><a href="/processos" style="color: #fff; text-decoration: none;">Voltar</a></button>
							<?php
							if($processo->status == 1){
							echo '<button class="btn btn-primary"><a href="#" style="color: #fff; text-decoration: none;">Editar</style="color: #fff;"a></button>';
							}
							?>
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection