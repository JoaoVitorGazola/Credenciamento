@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2> Nome do Processo </h2>
                	<br>
                   
                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                <li class="active nav-link">
                            
                                    <a href="{{url('/')}}" style="text-decoration: none; color: #212529;"> 
                                            <i class="fas fa-share-square"></i> 
                                    Envio </a>
                            
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

                   <br>

                    <h2> Dados do Envio </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/'])!!}
                        <div class="row">
                            
                            <div class="col-lg-3 col-sm-3 col-md-3">
                            {!! Form::label('farmacia', 'Farmácia') !!}
                            {!! Form::input('text', 'farmacia', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Farmácia Popular','readonly' ]) !!}
                            </div>
                            
                            <div class="col-sm-3 col-lg-3 col-md-3">
                                {!! Form::label('nome', 'Responsável') !!}

                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Luiz Marcelo', 'readonly']) !!}
                            </div>

                            <div class="col-sm-6 col-lg-6 col-md-6">
                                {!! Form::label('obs', 'Observações') !!}
                            {!! Form::input('text', 'obs', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Observações']) !!}

							<br>
                            </div>




                     </div>
                     <br>
                    <h2> Lista de Envios</h2>
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>

                     <div class="table-responsive">
						<table class="table table-hover table-bordered"> 
							<thead style="background-color: rgba(0,0,0,.03);">
							    <tr>
							      <th scope="col-6" style="width: 200px;">Tipo de Processo</th>
							      <th scope="col-6">Descrição</th>
							     
							      
							      <th scope="col-6">Ação</th>
							    </tr>
							  </thead>
							 
							  <tbody>
							    <tr>
							      <td scope="row"> example</td>
							      <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </td>
							      <td>
							      	
							      	{!! Form::file('file_name[]', ['multiple', 'accept'=>".pdf", 'class'=>'form-control-file']) !!}
							      </td>
							      


							    </tr>
							  
							  </tbody>
							

						</table>
					</div>
					
					
					<br>	
						<div class="float-right">
                            <button class="btn btn-primary"><a href="/processos/andamento" style="color: #fff; text-decoration: none;">Cancelar</a>
                            </button>

                            <button type="submit" class="btn btn-primary"><a href="/processos/andamento" style="color: #fff; text-decoration: none;">Enviar
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