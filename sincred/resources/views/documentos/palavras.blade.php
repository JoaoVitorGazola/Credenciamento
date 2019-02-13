@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header"> <h2>Cadastrar Palavras </h2>
                        <br>


                        <div class="panel with-nav-tabs panel-primary">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                    <li class="disabled nav-link">
                                        <i class="fas fa-copy"></i>
                                        Processo
                                    </li>

                                    <li class="disabled nav-link">
                                        <i class="fas fa-file"></i>

                                        Documento Requisitado



                                    </li>
                                    <li class="active nav-link">

                                        <a href="{{url('documentos/palavras')}}" style="text-decoration: none; color: #212529;">
                                            <i class="fas fa-file-alt"></i>
                                            Palavras
                                        </a>

                                    </li>

                                </ul>
                            </div>

                        </div>


                    </div>

                    <div class="card-body">
                        @if (session('excluirPalavra'))
                            <div class="alert alert-success" role="alert">
                                <i class="fas fa-check-circle"></i>
                                {{ session('excluirPalavra') }}
                            </div>
                        @endif

                        @if (session('erroPalavra'))
                            <div class="alert alert-danger" role="alert">
                                 <i class="fas fa-exclamation-triangle"></i>
                                {{ session('erroPalavra') }}
                            </div>
                        @endif

                        <div class="alert alert-primary" role="alert">
                            Os campos marcados com * são de preenchimento obrigatório.
                        </div>
                        <br>



                        <h2> Palavras Cadastradas</h2>

                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                        <br>
                        <br>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" style="text-align: center;">
                                <thead style="background-color: rgba(0,0,0,.03);">
                                <tr>
                                    <th style="width: 50px;">Documento Requisitado</th>
                                    <th style="width: 170px;"> Palavra-Chave </th>
                                    <th style="width: 10px;"> Quantidade</th>
                                    <th style="width: 10px;"> Ação </th>

                                </tr>
                                </thead>
                                <?php
                                foreach ($documentos as $documento){
                                    $palavras = \App\Palavra::where('documentos_id', $documento->id)->get();
                                    foreach ($palavras as $palavra){
                                ?>
                                    <tbody>
                                    <tr>
                                        <td class=""> {{$documento->tipo}} </td>
                                        <td> {{$palavra->palavra}} </td>
                                        <td> {{$palavra->quantidade}} </td>
                                        <td> 
                                            <?php

                                            echo '<a href="/documentos/palavras/'.$palavra->id.'/excluir" onclick="return confirm(\'Tem certeza que deseja excluir essa palavra?\');" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt" title="Excluir"></i>
                                            </a>'
                                            ?>
                                        </td>


                                    </tr>

                                    </tbody>
                               <?php
                               }
                                }
                                ?>

                            </table>
                        </div>
                        <br>
                        <br>


                        <h2> Cadastrar Palavras </h2>

                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                        <br>
                        <br>


                        {!!Form::open(['url'=>'/'.$id.'/documentos/palavras/salvar'])!!}
                        <div class="row">

                            <div class="col-lg-5 col-sm-5 col-md-5">
                                <strong>{!! Form::label('documentos_id', 'Documento Requisitado *') !!}</strong>
                                <select name="documentos_id" class="form-control" required>
                                    <option value="">Selecione o documento</option>
                                    @foreach($documentos as $documento)
                                        <option value="{{$documento->id}}">{{$documento->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                            <strong>{!! Form::label('palavra', 'Palavra-Chave *') !!}
                            </strong>
                                {!! Form::input('text', 'palavra', null, ['class' => 'form-control', 'required', 'placeholder' => 'Palavra-Chave']) !!}
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1">
                            <strong> {!! Form::label('quantidade', 'Qtde *') !!}
                            </strong>
                                {!! Form::number('quantidade', null, ['class' => 'form-control', 'min'=>'1', 'required']) !!}
                            </div>

                            <div class="col-md-12 col-sm-12 col-lg-1">

                                <button type="submit" class="btn btn-success btn-md"
                                        style="margin-top: 30px; width: 100px;">
                                    <i class="fas fa-plus" title="Adicionar"></i>
                                </button>
                            </div>


                            {!! Form::close() !!}
                        </div>
                        <br>

                        <br>

                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>

                        <br>


                        <br>
                        <div class="float-right">

                            <button class="btn btn-primary btn-md" onclick="window.location.href='/processos'"><a style="color: #fff; text-decoration: none;">Finalizar</a>
                            </button>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection