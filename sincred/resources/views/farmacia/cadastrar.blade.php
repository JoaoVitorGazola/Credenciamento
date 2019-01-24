@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2> Cadastrar Farmácia </h2>
                	<br>
                   
                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                <li class="active nav-link">
                            
                                    <a href="{{url('/farmacias/novo')}}" style="text-decoration: none; color: #212529;"> Farmácia </a>
                            
                                </li>
                                <li class="nav-link">
                                
                                    <a href="{{url('farmacias/responsavel')}}" style="text-decoration: none; color: #212529;">
                                  Responsável Legal   
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

                   

                    <h2> Dados da Farmácia </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/'])!!}
                        <div class="row">
                            
                            <div class="col-lg-4 col-sm-4 col-md-4">
                            {!! Form::label('razaoSocial', 'Nome / Razão Social *') !!}
                            {!! Form::input('text', 'razaoSocial', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                            </div>
                            
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                {!! Form::label('cnpj', 'CNPJ *') !!}

                            {!! Form::input('text', 'cnpj', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00.000.000/0000-00']) !!}
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                {!! Form::label('email', 'E-mail *') !!}
                            {!! Form::input('text', 'email', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'example@example.com']) !!}


                            </div>

                            <div class="col-sm-3 col-lg-3 col-md-3"> <br>
                                {!! Form::label('fixo', 'N° Telefone Fixo *') !!}
                               {!! Form::input('number', 'fixo', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '(00)0000-0000']) !!}
                           

                            </div>

                            <div class="col-sm-3 col-lg-3 col-md-3"> <br>
                                {!! Form::label('fixo', 'N° Telefone Celular') !!}
                               {!! Form::input('number', 'celular', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '(00)00000-0000']) !!}
                           

                            </div>

                           

                            {!! Form::close() !!}
                     </div>
                    <br>
                    <br>

                    <h2> Endereço da Farmácia </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/'])!!}
                        <div class="row">
                            
                            <div class="col-lg-3 col-sm-3 col-md-3">
                            {!! Form::label('cep', 'CEP *') !!}
                            {!! Form::input('number', 'cep', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00000-000', 'data-mask' => '00000-000']) !!}<a href="#">Não sei meu CEP</a>
                            </div>


                            
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                {!! Form::label('logradouro', 'Logradouro *') !!}

                            {!! Form::input('text', 'logradouro', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Logradouro']) !!}
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                {!! Form::label('bairro', 'Bairro *') !!}
                            {!! Form::input('text', 'bairro', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Bairro']) !!}


                            </div>
                            <div class="col-sm-1 col-lg-1 col-md-1">
                                {!! Form::label('numero', 'N°') !!}
                            {!! Form::input('number', 'numero', null, ['class' => 'form-control', 'autofocus']) !!}

                            <br>
                            <br>
                            </div>


                             <div class="col-sm-5 col-lg-5 col-md-5">  
                                {!! Form::label('complemento', 'Complemento') !!}

                            	{!! Form::input('text', 'complemento', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Complemento']) !!}
                            </div>
                            <div class="col-sm-3 col-lg-3 col-md-3">
                               {!! Form::label('UF', 'Estado *') !!}
								{!! Form::select('states', ['1'=> 'exemplo 1', '2'=>'exemplo 2', '3'=>'exemplo 3'], null, ['class'=>'form-control', 'placeholder' => 'UF']) !!}


                            </div>

                             <div class="col-sm-4 col-lg-4 col-md-4">
                               {!! Form::label('cities', 'Cidade *') !!}
								{!! Form::select('cities', ['1'=> 'exemplo 1', '2'=>'exemplo 2', '3'=>'exemplo 3'], null, ['class'=>'form-control', 'placeholder' => 'Selecione a Cidade']) !!}


                            </div>
                            {!! Form::close() !!}
                     </div>
                     <br>
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>
					
					
					<br>	
						<div class="float-right">
                            <button class="btn btn-primary"><a href="/farmacias" style="color: #fff; text-decoration: none;">Cancelar</a></button>
							<button class="btn btn-primary"><a href="{{url('farmacias/responsavel')}}" style="color: #fff; text-decoration: none;">Continuar</a></button>



							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection