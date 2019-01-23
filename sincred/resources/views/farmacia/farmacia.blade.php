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
					  	{!!Form::open(['url'=>'/farmacias/busca'])!!}
					  	<div class="row col-12">
							
							<div class="col-lg-3 col-sm-3 col-md-3">
								{!! Form::label('razaoSocial', 'Nome / Razão Social') !!}
								{!! Form::input('text', 'razaoSocial', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Razão Social']) !!}
							</div>
							
							<div class="col-sm-3 col-lg-3 col-md-3">
								{!! Form::label('cnpj', 'CNPJ') !!}
								{!! Form::input('text', 'cnpj', null, ['class' => 'form-control', 'placeholder' => '00.000.000/0000-00']) !!}
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
								      <th>Nome / Razão Social </th>
										<th> CNPJ </th>
										<th>E-mail </th>
								        <th>Telefone </th>

								    </tr>
							 	 </thead>
							 @foreach($farmacias as $farmacia)
							  <tbody>
								    <tr>
								      <td scope="row">{{$farmacia->razaoSocial}} </td>
										<td >{{$farmacia->cnpj}}</td>
										<td>{{$farmacia->email}}</td>
								      <td>  {{$farmacia->fixo}} </td>


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