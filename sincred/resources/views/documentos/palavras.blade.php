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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
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
                                @foreach($palavras as $palavra)
                                    <?php
                                    $documento = \App\Documento::findOrFail($palavra->documentos_id);
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td class=""> {{$documento->tipo}} </td>
                                        <td> {{$palavra->palavra}} </td>
                                        <td> {{$palavra->quantidade}} </td>
                                        <td> <a href="#" onclick="return confirm(\'Tem certeza que deseja excluir esse processo?\');" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt" title="Excluir"></i>
                                            </a>
                                        </td>


                                    </tr>

                                    </tbody>
                                @endforeach

                            </table>
                        </div>
                        <br>
                        <br>


                        <h2> Cadastrar Palavras </h2>

                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                        <br>
                        <br>


                        {!!Form::open(['url'=>'/documentos/palavras/salvar'])!!}
                        <div class="row">

                            <div class="col-lg-5 col-sm-5 col-md-5">
                                {!! Form::label('documentos_id', 'Documento Requisitado *') !!}
                                <select name="documentos_id" class="form-control">
                                    <option value="">Selecione o documento</option>
                                    @foreach($documentos as $documento)
                                        <option value="{{$documento->id}}">{{$documento->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                {!! Form::label('palavra', 'Palavra-Chave *') !!}
                                {!! Form::input('text', 'palavra', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Palavra-Chave']) !!}
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1">
                                {!! Form::label('quantidade', 'Qtde *') !!}
                                {!! Form::number('quantidade', null, ['class' => 'form-control']) !!}
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

                            <button class="btn btn-primary btn-md"><a href="{{url('/processos')}}" style="color: #fff; text-decoration: none;">Finalizar</a>
                            </button>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection