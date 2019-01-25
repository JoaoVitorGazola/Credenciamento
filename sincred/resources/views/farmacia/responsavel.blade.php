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
                <div class="card-header"> <h2> Cadastrar Farmácia </h2>
                	<br>
                   
                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                <li class="nav-link">
                            
                                    <a href="{{url('/farmacias/novo')}}" style="text-decoration: none; color: #212529;"> Farmácia </a>
                            
                                </li>
                                <li class=" active nav-link">
                                
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

                    <h2> Responsáveis </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                    <div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead style="background-color: rgba(0,0,0,.03);">
								    <tr>
								      <th>Nome Responsável </th>
										<th> CPF </th>
										<th>E-mail </th>
								        <th>Telefone </th>

								    </tr>
							 	 </thead>
							 @foreach($responsaveis as $responsavel)
							  <tbody>
								    <tr>
								      <td scope="row">{{$responsavel->nome}}</td>
										<td >{{$responsavel->cpf}}</td>
										<td> {{$responsavel->email}}</td>
								      <td>  {{$responsavel->celular}} </td>


								    </tr>

							  </tbody>
						@endforeach
							  
							</table>
						</div>
						<BR>

                   

                    <h2> Cadastrar Responsável </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/farmacias/responsavel/novo'])!!}
                        <div class="row">
                            
                            <div class="col-lg-4 col-sm-4 col-md-4">
                                {!! Form::input('hidden', 'farmacias_id', $id,['class'=>'form-control']) !!}
                            {!! Form::label('nome', 'Nome Responsável *') !!}
                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome Responsável']) !!}
                            </div>
                            
                            <div class="col-sm-3 col-lg-3 col-md-3">
                                {!! Form::label('cpf', 'CPF *') !!}

                            {!! Form::input('number', 'cpf', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '000.000.000-00']) !!}
                            </div>

                            <div class="col-sm-3 col-lg-3 col-md-3">
                                {!! Form::label('email', 'E-mail *') !!}
                            {!! Form::input('text', 'email', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'example@example.com']) !!}


                            </div>

                            <div class="col-sm-2 col-lg-2 col-md-2">
                                {!! Form::label('celular', 'N° Telefone *') !!}
                               {!! Form::input('number', 'celular', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '(00)00000-0000']) !!}
                            <br>
                            </div>

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
                                {!! Form::label('states_id', 'Estado *') !!}
                                <select class="form-control" id="states" name="states_id" onchange="myFunction();">
                                    <option value={{null}}>Selecione o estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->abbreviation}}</option>
                                    @endforeach
                                </select>
                                {{csrf_field(['id'=>'token'])}}

                            </div>

                             <div class="col-sm-4 col-lg-4 col-md-4">
                                 {!! Form::label('cities_id', 'Cidade *') !!}
                                 <select name="cities_id" id="city" class="form-control">
                                     <option value="{{null}}">Selecione a cidade</option>
                                 </select>

                            </div>

                            <div class="col-2" style="margin-top: 30px;">
                            	{!! Form::submit('Adicionar responsavel', ['class'=>'btn btn-primary']) !!}

                            </div>

                            {!! Form::close() !!}
                     </div>
                    
                      
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>
					
					
					<br>	
						<div class="float-right">
                            <button class="btn btn-primary"><a href="{{url('/farmacias/novo')}}" style="color: #fff; text-decoration: none;">Voltar</a></button>
							<button class="btn btn-primary"><a href="{{url('/farmacias')}}" style="color: #fff; text-decoration: none;">Cadastrar</a></button>



							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection