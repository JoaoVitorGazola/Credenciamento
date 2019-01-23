@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                 <h2>Farmácias </h2></div>

                <div class="card-body">
                    @if (session('encontrado'))
                        <div class="alert alert-success" role="alert">
                            {{ session('encontrado') }}
                        </div>
                    @endif


                    <div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,.03);">
					  <div class="container">
					  	{!!Form::open(['url'=>'/'])!!}
					  	<div class="row col-12">
							
							<div class="col-lg-3 col-sm-3 col-md-3">
							<strong>{!! Form::label('cnpj', 'CNPJ') !!}</strong>
							{!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00.000.000/0000-00']) !!}
							</div>
							
							<div class="col-sm-3 col-lg-3 col-md-3">
								{!! Form::label('razaoSocial', 'Nome / Razão Social') !!}
								{!! Form::input('text', 'razaoSocial', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Razão Social']) !!}
							</div>

							<div class="col-sm-2 col-lg-2 col-md-2">
								{!! Form::label('states', 'Estado') !!}
							{!! Form::select('states', ['1'=> 'exemplo 1', '2'=>'exemplo 2', '3'=>'exemplo 3'], null, ['class'=>'form-control', 'placeholder' => 'UF']) !!}


							</div>
							<div class="col-sm-3 col-lg-3 col-md-3">
								{!! Form::label('cities', 'Cidade') !!}
							{!! Form::select('cities', ['1'=> 'exemplo 1', '2'=>'exemplo 2', '3'=>'exemplo 3'], null, ['class'=>'form-control', 'placeholder' => 'Selecione']) !!}

							</div>
							<div class="col-1" style="margin-top: 30px;">
								{!! Form::submit('Pesquisar', ['class'=>'btn btn-primary']) !!}
							</div>

							{!! Form::close() !!}
                  	</div>

                  	<br>
              				<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
              		<br>

								<div class="container">
			                  	<div class="row col-12">
                                    <button class="btn btn-primary">
                                    	<a href="/farcamia/novo" style="text-decoration: none; color: #fff;">Novo registro</a> 
                                    </button>

			                  	</div>
			                  </div>
					    
					  </div>
					</div>



					<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead style="background-color: rgba(0,0,0,.03);">
								    <tr>
								      <th> CNPJ </th>
								      <th>Nome / Razão Social </th>
								       <th>E-mail </th>
								        <th>Telefone </th>

								    </tr>
							 	 </thead>
							 
							  <tbody>
								    <tr>
								      <td scope="row"> 00.000.000/0000-00 </td>
								      <td> Farmácia Popular </td>
								      <td> farmaciapopular@gmail.com </td>
								      <td>  (00) 0000-0000 </td>


								    </tr>

							  </tbody>
							
							  
							</table>
						</div>
					

                </div>
            </div>
        </div>
    </div>
</div>
@endsection