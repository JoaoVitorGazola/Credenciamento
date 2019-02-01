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
                <div class="card-header"> <h2> Cadastrar Responsável </h2>
                	<br>
                   
                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                <li class="disabled nav-link">
                               <i class="fas fa-hospital-alt"></i>
                                    Farmácia 
                            
                                </li>
                                <li class=" active nav-link">
                                
                                    <a href="{{url('farmacias/responsavel')}}" style="text-decoration: none; color: #212529;">
                                        <i class="fas fa-id-card-alt"></i>
                                  Responsável Legal   
                                    </a>

                                
                                </li>
                          
                            </ul>
                        </div>
            
                     </div>

                </div>

                <div class="card-body">
                    @if (session('excluirrespon'))
                        <div class="alert alert-success" role="alert">
                           <i class="fas fa-check-circle"></i>
                            {{ session('excluirrespon') }}
                        </div>
                    @endif

                     @if (session('responerro'))
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ session('responerro') }}
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
								<thead style="background-color: rgba(0,0,0,.03); text-align: center;">
								    <tr>
								      <th>Nome Responsável </th>
										<th> CPF </th>
										<th>E-mail </th>
								        <th>Telefone </th>
                                        <th> Ação </th>

								    </tr>
							 	 </thead>
							 @foreach($responsaveis as $responsavel)
							  <tbody style="text-align: center;">
								    <tr>
								      <td scope="row">{{$responsavel->nome}}</td>
										<td >{{$responsavel->cpf}}</td>
										<td> {{$responsavel->email}}</td>
								      <td>  {{$responsavel->celular}} </td>
                                      <td> 
                                        <?php 
                                        echo 
                    '<a href="/farmacias/'.$responsavel->id.'/excluir" onclick="return confirm(\'Tem certeza que deseja excluir esse responsável?\');" class="btn btn-danger btn-sm">
                <i class="fas fa-trash-alt" title="Excluir"></i>
                 </a>'

                                        ?>
                                        </a>
                                      </td>



								    </tr>

							  </tbody>
						@endforeach
							  
							</table>
						</div>
						<BR>

                   

                    <h2> Dados do Responsável </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/farmacias/responsavel/novo'])!!}
                        <div class="row">
                            
                            <div class="col-lg-4 col-sm-4 col-md-4">
                                {!! Form::input('hidden', 'farmacias_id', $id,['class'=>'form-control']) !!}
                         <strong> 
                            {!! Form::label('nome', 'Nome Responsável *') !!}
                         </strong>
                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nome Responsável']) !!}
                            </div>
                            
                            <div class="col-sm-3 col-lg-3 col-md-3">
                              <strong>
                                {!! Form::label('cpf', 'CPF *') !!}
                            </strong>
                            {!! Form::input('text', 'cpf', null, ['class' => 'form-control', 'required', 'placeholder' => '000.000.000-00']) !!}
                            </div>

                            <div class="col-sm-3 col-lg-3 col-md-3">
                            <strong>
                            {!! Form::label('email', 'E-mail *') !!}
                            </strong>
                            {!! Form::input('text', 'email', null, ['class' => 'form-control', 'required', 'placeholder' => 'example@example.com']) !!}


                            </div>

                            <div class="col-sm-2 col-lg-2 col-md-2">
                          <strong>{!! Form::label('celular', 'N° Telefone *') !!}</strong>
                               {!! Form::input('text', 'celular', null, ['class' => 'form-control', 'required', 'placeholder' => '(00)00000-0000']) !!}
                            <br>
                            </div>

                            <div class="col-lg-3 col-sm-3 col-md-3">
                          <strong> {!! Form::label('cep', 'CEP *') !!}</strong>
                            {!! Form::input('text', 'cep', null, ['class' => 'form-control', 'required', 'placeholder' => '00000-000', 'data-mask' => '00000-000']) !!}
                            <a href="#">Não sei meu CEP</a>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                             <strong>{!! Form::label('logradouro', 'Logradouro *') !!}
                             </strong>

                            {!! Form::input('text', 'logradouro', null, ['class' => 'form-control', 'required', 'placeholder' => 'Logradouro']) !!}
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                           <strong>{!! Form::label('bairro', 'Bairro *') !!}</strong>
                            {!! Form::input('text', 'bairro', null, ['class' => 'form-control', 'required', 'placeholder' => 'Bairro']) !!}


                            </div>
                            <div class="col-sm-1 col-lg-1 col-md-1">
                           <strong>{!! Form::label('numero', 'N°') !!}</strong>
                            {!! Form::input('text', 'numero', null, ['class' => 'form-control']) !!}

                            <br>
                            <br>
                            </div>


                             <div class="col-sm-5 col-lg-5 col-md-5">  
                             <strong> {!! Form::label('complemento', 'Complemento') !!}
                             </strong>

                            	{!! Form::input('text', 'complemento', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Complemento']) !!}
                            </div>
                            <div class="col-sm-3 col-lg-3 col-md-3">
                            <strong>{!! Form::label('states_id', 'Estado *') !!}</strong>
                                <select class="form-control" id="states" name="states_id" onchange="myFunction();" required>
                                    <option value={{null}}>Selecione o estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->abbreviation}}</option>
                                    @endforeach
                                </select>
                                {{csrf_field(['id'=>'token'])}}

                            </div>

                             <div class="col-sm-4 col-lg-4 col-md-4">
                              <strong> {!! Form::label('cities_id', 'Cidade *') !!}
                              </strong>
                                 <select name="cities_id" id="city" class="form-control" required> 
                                     <option value="{{null}}">Selecione a cidade</option>
                                 </select>

                            </div>

                            <div class="col-2" style="margin-top: 30px;">
                            	<button type="submit" class="btn btn-primary btn-sm"> Adicionar Responsável <i class="fas fa-plus"></i></button>

                            </div>

                            {!! Form::close() !!}
                     </div>
                    
                      
    
                    <br>

                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                     <br>
					
					
					<br>	
						<div class="float-right">
                           
						<button class="btn btn-primary"><a href="{{url('/farmacias')}}" style="color: #fff; text-decoration: none;">Finalizar</a></button>



							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection