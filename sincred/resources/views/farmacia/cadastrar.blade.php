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
                                <li class="active nav-link">
                            
                                    <a href="{{url('/farmacias/novo')}}" style="text-decoration: none; color: #212529;"> 
                                <i class="fas fa-hospital-alt"></i>
                                    Farmácia </a>
                            
                                </li>
                                <li class="disabled nav-link">
                                <i class="fas fa-id-card-alt"></i>
                                  Responsável Legal   
                                 

                                
                                </li>
                          
                            </ul>
                        </div>
            
                     </div>

                </div>

                <div class="card-body">
                    @if (session('manoel'))
                        <div class="alert alert-danger" role="alert">
                           <i class="fas fa-exclamation-triangle"></i>
                            {{ session('manoel') }}
                        </div>
                    @endif

                    <div class="alert alert-primary" role="alert">
					  Os campos marcados com * são de preenchimento obrigatório.
					</div>
                    <br>

                   

                    <h2> Dados da Farmácia </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/farmacias/novo/salvar'])!!}
                        <div class="row">
                            
                            <div class="col-lg-4 col-sm-4 col-md-4">
                          <strong>  {!! Form::label('razaoSocial', 'Nome / Razão Social *') !!}</strong>
                           {!! Form::input('text', 'razaoSocial', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nome']) !!}
                            </div>
                            
                            <div class="col-sm-4 col-lg-4 col-md-4">
                          <strong>  {!! Form::label('cnpj', 'CNPJ *') !!}</strong>
                             
                             {!! Form::input('text', 'cnpj', null, ['class' => 'form-control', 'required', 'placeholder' => '00.000.000/0000-00']) !!}
                            </div>
                          

                            <div class="col-sm-4 col-lg-4 col-md-4">
                           <strong>     {!! Form::label('email', 'E-mail *') !!}</strong>
                            {!! Form::input('email', 'email', null, ['class' => 'form-control', 'required', 'placeholder' => 'example@example.com']) !!}


                            </div>

                            <div class="col-sm-3 col-lg-3 col-md-3"> <br>
                             <strong>   {!! Form::label('fixo', 'N° Telefone Fixo *') !!} </strong>
                               {!! Form::input('text', 'fixo', null, ['class' => 'form-control', 'required', 'placeholder' => '(00)0000-0000']) !!}
                           

                            </div>

                            <div class="col-sm-3 col-lg-3 col-md-3"> <br>
                             <strong>   {!! Form::label('celular', 'N° Telefone Celular ') !!}</strong>
                               {!! Form::input('text', 'celular', null, ['class' => 'form-control', '', 'placeholder' => '(00)0000-0000']) !!}
                           

                            </div>

                     </div>
                    <br>
                    <br>

                    <h2> Endereço da Farmácia </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                        <div class="row">
                            
                            <div class="col-lg-3 col-sm-3 col-md-3">
                         <strong>  {!! Form::label('cep', 'CEP *') !!} </strong>
                            {!! Form::input('text', 'cep', null, ['class' => 'form-control', 'required', 'placeholder' => '00000-000']) !!}
                            <a href="#">Não sei meu CEP</a>
                            </div>


                            
                            <div class="col-sm-4 col-lg-4 col-md-4">
                            <strong> {!! Form::label('logradouro', 'Logradouro *') !!} 
                            </strong>

                            {!! Form::input('text', 'logradouro', null, ['class' => 'form-control', 'required', 'placeholder' => 'Logradouro']) !!}
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                          <strong>{!! Form::label('bairro', 'Bairro *') !!}</strong>
                            {!! Form::input('text', 'bairro', null, ['class' => 'form-control', 'required', 'placeholder' => 'Bairro']) !!}


                            </div>
                            <div class="col-sm-1 col-lg-1 col-md-1">
                            <strong> {!! Form::label('numero', 'N° ') !!} </strong>
                            {!! Form::input('text', 'numero', null, ['class' => 'form-control', 'autofocus', '']) !!}

                            <br>
                            <br>
                            </div>


                             <div class="col-sm-5 col-lg-5 col-md-5">  
                           <strong>{!! Form::label('complemento', 'Complemento ') !!}
                           </strong>

                            	{!! Form::input('text', 'complemento', null, ['class' => 'form-control', '', 'placeholder' => 'Complemento']) !!}
                            </div>
                            <div class="col-sm-3 col-lg-3 col-md-3">
                            <strong>   {!! Form::label('states_id', 'Estado *') !!}
                            </strong>
                                <select class="form-control" id="states" name="states_id" onchange="myFunction();" required>
                                    <option value={{null}}>Selecione o estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->abbreviation}}</option>
                                    @endforeach
                                </select>
                                {{csrf_field(['id'=>'token'])}}

                            </div>

                             <div class="col-sm-4 col-lg-4 col-md-4">
                              <strong>   {!! Form::label('cities_id', 'Cidade *') !!}
                              </strong>
                                 <select name="cities_id" id="city" class="form-control" required>
                                     <option value="{{null}}">Selecione a cidade</option>
                                 </select>

                            </div>

                     </div>
                     <br>
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>
					
					
					<br>	
						<div class="float-right">
                            <button class="btn btn-primary"><a href="/farmacias" style="color: #fff; text-decoration: none;">Cancelar</a></button>
							{!! Form::submit('Cadastrar',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}


							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection