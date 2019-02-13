@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header"> <h2>Cadastrar Documento Requisitado </h2>
                        <br>


                        <div class="panel with-nav-tabs panel-primary">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs" style="margin-bottom: -13px;">
                                    <li class="disabled nav-link">
                                        <i class="fas fa-copy"></i>
                                        Processo

                                    </li>
                                    <li class="active nav-link">

                                        <a href="{{url('documentos/novo')}}" style="text-decoration: none; color: #212529;">
                                            <i class="fas fa-file"></i>
                                            Documento Requisitado
                                        </a>


                                    </li>
                                    <li class="disabled nav-link">


                                        <i class="fas fa-file-alt"></i>
                                        Palavras


                                    </li>

                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="card-body">
                        @if (session('excluir'))
                            <div class="alert alert-success" role="alert">
                              <i class="fas fa-check-circle"></i>
                                {{ session('excluir') }}
                            </div>
                        @endif

                        @if (session('erro'))
                            <div class="alert alert-danger" role="alert">
                             <i class="fas fa-exclamation-triangle"></i>
                              {{ session('erro') }}
                            </div>
                        @endif

                        <div class="alert alert-primary" role="alert">
                            Os campos marcados com * são de preenchimento obrigatório.
                        </div>
                        <br>



                        <h2> Documentos Requisitados </h2>

                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                        <br>
                        <br>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" style="text-align: center;">
                                <thead style="background-color: rgba(0,0,0,.03);">
                                <tr>
                                    <th style="width: 50px;">Tipo do Documento</th>
                                    <th style="width: 170px;"> Descrição </th>
                                    <th style="width: 10px;"> Ação </th>

                                </tr>
                                </thead>
                                @foreach($documentos as $documento)
                                    <tbody>
                                    <tr>
                                        <td class=""> {{$documento->tipo}} </td>
                                        <td> {{$documento->descrição}} </td>
                                        <td>
                                            <?php

                                            echo '<a href="/documentos/'.$documento->id.'/excluir" onclick="return confirm(\'Tem certeza que deseja excluir esse documento?\');" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt" title="Excluir"></i>
                                            </a>'
                                            ?>
                                        </td>


                                    </tr>

                                    </tbody>
                                @endforeach

                            </table>
                        </div>
                        <br>
                        <br>


                        <h2> Informações do Documento </h2>

                        <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                        <br>
                        <br>


                        {!!Form::open(['url'=>'/'.$id.'/documentos/novo/salvar'])!!}
                        <div class="row">

                            <div class="col-lg-5 col-sm-5 col-md-5">
                            <strong>{!! Form::label('tipo', 'Tipo do Documento *') !!}
                            </strong>
                                {!! Form::input('text', 'tipo', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Tipo do Documento']) !!}
                            </div>

                            <div class="col-sm-5 col-lg-5 col-md-5">
                            <strong>{!! Form::label('descrição', 'Descrição *') !!}</strong>
                                {!! Form::input('text', 'descrição', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Descrição']) !!}
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-2">

                                <button type="submit" class="btn btn-success btn-md" style="margin-top: 30px; width: 85px;">
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

                            <button class="btn btn-primary btn-md" onclick="window.location.href='/{{$id}}/documentos/palavras'">
                                <a href="{{url('/'.$id.'/documentos/palavras')}}" style="color: #fff; text-decoration: none;">
                                    Cadastrar
                                </a>
                            </button>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection