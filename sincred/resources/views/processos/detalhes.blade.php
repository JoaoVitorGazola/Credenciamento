@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2> Detalhe do Processo </h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                  
						<h2> Processos </h2> 

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
							  
							  <tbody>
								    <tr>
								      <td> Exemple </td>
								      <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt facilisis ante sed tempor. Lorem ipsum dolor sit amet.</td>
								      
								      
								    </tr>
							  
							  </tbody>

							  
						</table>
					</div>

					<br>	
						<div class="float-right">
							<button class="btn btn-primary"><a href="/processos">Voltar</a></button>
							<?php
							if($processo->status == 1){
							echo '<button class="btn btn-primary"><a href="#">Editar</a></button>';
							}
							?>
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection