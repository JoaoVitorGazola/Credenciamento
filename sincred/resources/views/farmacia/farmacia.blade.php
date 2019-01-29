@extends('layouts.app')

@section('content')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script>
        function myFunction()
        {
            var value = $('#states').val();


            $.ajax({
                url:"{{url('/farmacias/fetch')}}",
                method:"GET",
                data:{value:value},
                success:function (result) {
                    $('#city').find("option").remove();
                    $('#city').append(result);
                },
				error:function () {
					alert("erro")
                }
            })
        }
	</script>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-sm-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h2>Farmácias </h2>
					</div>

					<div class="card-body">
						@if (session('encontradofarma'))
							<div class="alert alert-success" role="alert">
								{{ session('encontradofarma') }}
							</div>
						@endif


						<div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,.03);">
							<div class="container">
								{!!Form::open(['url'=>'/farmacias/busca'])!!}
								<div class="row col-12">

									<div class="col-lg-3 col-sm-3 col-md-3">
									<strong>	{!! Form::label('razaoSocial', 'Nome / Razão Social') !!} </strong>
										{!! Form::input('text', 'razaoSocial', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Razão Social']) !!}
									</div>

									<div class="col-sm-3 col-lg-3 col-md-3">
									<strong>{!! Form::label('cnpj', 'CNPJ') !!}</strong>
										{!! Form::input('text', 'cnpj', null, ['class' => 'form-control', 'placeholder' => '00.000.000/0000-00']) !!}
									</div>


									<div class="col-sm-2 col-lg-2 col-md-2">
									<strong>{!! Form::label('states', 'Estado') !!}
									</strong>
										<select class="form-control" id="states" name="states" onchange="myFunction();">
											<option value={{null}}>Selecione o estado</option>
											@foreach($estados as $estado)
												<option value="{{$estado->id}}">{{$estado->abbreviation}}</option>
											@endforeach
										</select>
									{{csrf_field(['id'=>'token'])}}
									</div>
									<div class="col-sm-3 col-lg-3 col-md-3">
									<strong>{!! Form::label('city', 'Cidade') !!}</strong>

										<select name="city" id="city" class="form-control">
											<option value="{{null}}">Selecione a cidade</option>
										</select>
									</div>

									<div class="col-1" style="margin-top: 30px;">
										<button type="submit" class="btn btn-primary btn-md" title="Pesquisar">Pesquisar <i class="fas fa-search"></i></button>
									</div>

									{!! Form::close() !!}
								</div>

								<br>
								<li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
								<br>

								<div class="container">
									<div class="row col-12">
										<button class="btn btn-primary btn-md">
											<a href="/farmacias/novo" style="text-decoration: none; color: #fff;" title="Novo Registro">Novo Registro <i class="fas fa-plus-circle"></i></a>
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
