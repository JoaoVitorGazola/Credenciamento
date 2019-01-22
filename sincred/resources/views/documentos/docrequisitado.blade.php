@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2>Cadastrar Documento Requisitado </h2>
                	<br>

                	<div class="panel with-nav-tabs panel-default">
		                <div class="panel-heading">

		                   <ul class="nav nav-tabs" style="margin-bottom: -13px;">
		                     <li class="disabled  nav-link">Processo</a></li>
		                     <li class="active nav-link">Documentos Requisitados</a></li>
		                     <li class="disabled nav-link">Palavras</a></li>
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

                   

                    <h2> Informações do Processo </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/'])!!}
                        <div class="row">
                            
                            <div class="col-lg-6 col-sm-6 col-md-6">
                            {!! Form::label('nome', 'Nome *') !!}
                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome do Processo']) !!}
                            </div>
                            
                            <div class="col-sm-3 col-lg-3 col-md-3">
                                {!! Form::label('inicio', 'Data Início *') !!}

                            {!! Form::date('inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000']) !!}
                            </div>

                            <div class="col-sm-3 col-lg-3 col-md-3">
                                {!! Form::label('final', 'Data Final *') !!}
                            {!! Form::date('final', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000']) !!}


                            </div>

                            <div class="col-sm-12 col-lg-12 col-md-12"> <br>
                                {!! Form::label('desc', 'Descrição') !!}
                                {!! Form::textarea('textarea', null, ['class' => 'form-control', 'placeholder' => 'Descrição', 'rows' =>'5']) !!}
                           

                            </div>

                           

                            {!! Form::close() !!}
                     </div>
                    <br>
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>
					
					
					<br>	
						<div class="float-right">
                            <button class="btn btn-primary"><a href="{{url('processos/novo')}}" style="color: #fff; text-decoration: none;">Voltar</a></button>
							<button class="btn btn-primary"><a href="#" style="color: #fff; text-decoration: none;">Continuar</a></button>



							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection