@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2> Cadastrar Processo </h2>
                	<br>

                	<div class="panel with-nav-tabs panel-default">
		                <div class="panel-heading">

		                   <ul class="nav nav-tabs" style="margin-bottom: -13px;">
		                     <li class="active nav-link">Processo</a></li>
		                     <li class="disabled nav-link">Documentos Requisitados</a></li>
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
						<div class="float-right">
							<button class="btn btn-primary"><a href="/processos" style="color: #fff; text-decoration: none;">Voltar</a></button>
							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection