@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"> <h2> Lista de Responsáveis </h2>
                </div>

                <div class="card-body">

                    @if (session('achado'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i>
                            {{ session('achado') }}
                        </div>
                    @endif

                    <div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,.03);">
                      <div class="container">
                        {!!Form::open(['url'=>'/'])!!}
                                <div class="row col-12">

                                    <div class="col-lg-4 col-sm-4 col-md-4">
                                    <strong>    {!! Form::label('nome', 'Nome do Responsável') !!} </strong>
                                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome do Responsável']) !!}

                                        

                                    </div>

                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                    <strong>{!! Form::label('cpf', 'CPF') !!}</strong>
                                        {!! Form::input('text', 'cpf', null, ['class' => 'form-control', 'placeholder' => '000.000.000-00', 'maxlength' => '14']) !!}
                                    </div>

                                     <div class="col-sm-3 col-lg-3 col-md-3">
                                    <strong>{!! Form::label('email', 'E-mail') !!}</strong>
                                        {!! Form::input('text', 'cpf', null, ['class' => 'form-control', 'placeholder' => 'example@example.com']) !!}
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
                                    <button class="btn btn-primary btn-md" onclick="window.location.href='farmacias/responsavel/novo'">
                                        <a href="farmacias/responsavel/novo" style="text-decoration: none; color: #fff;" title="Novo Responsável">Novo Registro</a> <i class="fas fa-plus-circle"></i> </button>

                                </div>
                              </div>
                      </div>
                    </div>

                    
                        <h2> Lista de Processos</h2>
                        
                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> 
                        </li>
                        <br>

                        <div class="table-responsive">
                        <table class="table table-hover table-bordered"> 
                            <thead style="background-color: rgba(0,0,0,.03); text-align: center;">
                                <tr>
                                  <th scope="col-6">Nome do Responsável</th>
                                  <th scope="col-6">CPF</th>
                                  <th scope="col-6">E-mail</th>
                                  <th scope="col-6">Telefone</th>
                                </tr>
                              </thead>
                              <!--- Tabela Aguardando --->
                           
                              <tbody style="text-align: center;">
                                <tr>
                                  <td scope="row">Luiz Marcelo</td>
                                  <td>000.000.000-00</td>
                                  <td>example@example.com</td>
                                  <td>(00)00000-0000</td>
                                 
                                  


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
