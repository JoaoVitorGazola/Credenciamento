@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2>Cadastrar Palavras </h2>
                	<br>


                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                <li class="disabled nav-link">
                            
                                     Processo 
                                </li>

                                <li class="disabled nav-link">
                                
                                    
                                  Documento Requisitado   
                                    

                                
                                </li>
                                <li class="active nav-link">
                                
                                    <a href="{{url('documentos/palavras')}}" style="text-decoration: none; color: #212529;">
                                        Palavras
                                    </a>
                               
                                </li>
                          
                            </ul>
                        </div>
            
                     </div>
                	

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-primary" role="alert">
					  Os campos marcados com * são de preenchimento obrigatório.
					</div>
                    <br>

                   

                    <h2> Palavras Cadastradas</h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>
                    <br>

                    <div class="table-responsive">
							<table class="table table-hover table-bordered" style="text-align: center;">
								<thead style="background-color: rgba(0,0,0,.03);">
								    <tr>
								      <th style="width: 50px;">Documento Requisitado</th>
								      <th style="width: 170px;"> Palavra-Chave </th>
								      <th style="width: 10px;"> Quantidade</th>
								      <th style="width: 10px;"> Ação </th>

								    </tr>
							 	 </thead>
							 
							  <tbody>
								    <tr>
								      <td class=""> exemplo </td>
								      <td> exemplo </td>
								      <td> 0 </td>
								      <td><button class="btn btn-danger">Excluir</button>
								      </td>


								    </tr>

							  </tbody>
						
							  
							</table>
						</div>
						<br>
						<br>


						<h2> Cadastrar Palavras </h2>

                    	<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    	<br>
                    	<br>

                     
                        {!!Form::open(['url'=>'/'])!!}
                        <div class="row">
                            
                            <div class="col-lg-5 col-sm-5 col-md-5">
                            {!! Form::label('docrequi', 'Documento Requisitado *') !!}
							{!! Form::select('docrequi', ['1'=> 'exemplo 1', '2'=>'exemplo 2', '3'=>'exemplo 3'], null, ['class'=>'form-control', 'placeholder' => 'Selecione']) !!}
                            </div>
                            
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                {!! Form::label('desc', 'Palavra-Chave *') !!}
                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Palavra-Chave']) !!}
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1">
                                {!! Form::label('quantidade', 'Qtde *') !!}
                            {!! Form::number('number', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="col-sm-2 col-lg-2 col-md-2">
                                <button class="btn btn-success" style="margin-top: 30px; width: 100px;">Add</button>
								

                            </div>


                            {!! Form::close() !!}
                     </div>
                    <br>
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>
					
					
					<br>	
						<div class="float-right">
                          
							<button class="btn btn-primary"><a href="{{url('/processos')}}" style="color: #fff; text-decoration: none;">Finalizar</a>
							</button>



							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection