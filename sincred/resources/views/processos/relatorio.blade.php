@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                 <h2>Relatório do envio da {{$farmacia->razaoSocial}} </h2>
                	
                </div>

                <div class="card-body">
                    @if (session('relatorio'))
                        <div class="alert alert-success" role="alert">
                          <i class="fas fa-check-circle"></i>
                            {{ session('relatorio') }}
                        </div>
                    @endif

                   <br>

                    <h3> Relatório Final: <?php
                        $resultado = $envio->status;
                        $envio->save();
                        if($resultado == 0){
                            echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Erro">
									 <button class="btn btn-secondary btn-sm" style="pointer-events: none;" type="button">Erro</button>
									</span>';
                        }
                        elseif ($resultado == 1){
                            echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Reprovado">
									 <button class="btn btn-danger btn-sm" style="pointer-events: none;" type="button">Reprovado</button>
									</span>';
                        }
                        else{
                            echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Aprovado">
									 <button class="btn btn-success btn-sm" style="pointer-events: none;" type="button">Aprovado</button>
									</span>';
                        }
                        ?></h3>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                    

                     <div class="row">

                     	<div class="col-lg-9 col-sm-12">
                     		<div data-spy="scroll" data-target="#navbar-example3" data-offset="0" 
                        style="height: 140px; position: relative; overflow: auto;">
                       
                        <ul class="nav nav-tabs" role="tablist">

                          <li>
                            <h4 id="item1"> Resultados: </h4> 
                           
                            <p> {!! $text !!} </p>

                            
                          </li>
                          
                          
                        </ul>
                     			

                     		</div>
                     	</div>
                      <div class="col-lg-3">
                     	<button class="btn btn-primary" onclick="window.location.href='/envios/relatorio/{{$envio->id}}/download'">
                        <a href="/envios/relatorio/{{$envio->id}}/download" style="color: #fff; text-decoration: none;">Download</a>
                     </button>
                     <br>
                     <br>
                     <button class="btn btn-danger" onclick="window.location.href='/envios/relatorio/{{$envio->id}}/reprovar'">
                      <a href="/envios/relatorio/{{$envio->id}}/reprovar" style="color: #fff; text-decoration: none;">Reprovar</a>
                     </button>
                     <br>
                     <br>
                      <button class="btn btn-success" onclick="window.location.href='/envios/relatorio/{{$envio->id}}/aprovar'">
                        <a href="/envios/relatorio/{{$envio->id}}/aprovar" style="color: #fff; text-decoration: none;">Aprovar</a>
                     </button>
                     
                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;">
                      </li>
                    
                     </div>
                     </div>
                     <br>
                     
                    
                   
					 {!! Form::close() !!}	


                     <div class="jumbotron jumbotron-fluid" style="height:250px;">
                <div class="container col-12">
                    <div class="col-6" style="float: left;">
                    <h2> Informações da Farmácia </h2>

                     <hr class="my-4">
                    

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Dados da Farmácia</button>

                     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title">
                                <h5> <strong> Dados da Farmácia </strong> </h5>
                            </div>
            
                        </div>
                         <div class="table-responsive">
                            <table class="table">
                                <thead style="background-color: rgba(0,0,0,.03); text-align: center;">
                                    <tr>
                                      <th>Nome / Razão Social</th>
                                      <th> CNPJ </th>
                                       <th> Telefone fixo </th>
                                       <th> Telefone celular </th>
                                        <th> E-mail </th>


                                    </tr>
                                 </thead>
                              <tbody style="text-align: center;">
                                    <tr>
                                      <td class=""> {{$farmacia->razaoSocial}}</td>
                                      <td> {{$farmacia->cnpj}} </td>
                                       <td> {{$farmacia->fixo}} </td>
                                       <td>
                                           <?php
                                       if($farmacia->celular == null){echo 'Sem registro';}
                                       else{
                                           echo $farmacia->celular;
                                       }
                                       ?>
                                       </td>
                                        <td> {{$farmacia->email}} </td>
                                    </tr>

                              </tbody>
                            
                              
                            </table>
                        </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            
                          </div>
                    </div>

                  </div>
                </div>

                    <!-- Model endereço Farmacia -->

                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".end-example-modal-lg">Endereço da Farmácia</button>

                     <div class="modal fade end-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title">
                                <h5> <strong> Endereço da Farmácia </strong> </h5>
                            </div>
            
                        </div>
                         <div class="table-responsive">
                            <table class="table">
                                <thead style="background-color: rgba(0,0,0,.03); text-align: center;">
                                    <tr>
                                      <th>CEP</th>
                                      <th> Lougradouro </th>
                                       <th> Bairro </th>
                                        <th> Complemento </th>
                                          <th> Número </th>
                                            <th> Estado </th>
                                            <th> Cidade </th>


                                    </tr>
                                 </thead>
                              
                              <tbody style="text-align: center;">
                                    <tr>
                                      <td class=""> {{$farmacia->cep}} </td>
                                      <td> {{$farmacia->logradouro}} </td>
                                       <td> {{$farmacia->bairro}} </td>
                                        <td> {{$farmacia->complemento}} </td>
                                        <td>{{$farmacia->numero}} </td>
                                        <td>
                                        <?php
                                            $estado = \App\State::findOrFail($farmacia->states_id);
                                            echo $estado->name;
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                            $cidade = \App\Citie::findOrFail($farmacia->cities_id);
                                            echo $cidade->name;
                                            ?>
                                        </td>
                                    </tr>

                              </tbody>
                            
                              
                            </table>
                        </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            
                          </div>
                    </div>

                  </div>

                 </div>
                </div>

                <div class="col-6" style="float: right;">
                 <h2 > Informações do Responsável </h2>
                   <hr class="my-4">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".resp-example-modal-lg">Dados do Responsável</button>

                <div class="modal fade resp-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title">
                                <h5> <strong> Dados do Responsável </strong> </h5>
                            </div>
            
                        </div>
                         <div class="table-responsive">
                            <table class="table">
                                <thead style="background-color: rgba(0,0,0,.03); text-align: center;">
                                    <tr>
                                      <th>Nome</th>
                                      <th> CPF</th>
                                       <th> Telefone </th>
                                        <th> E-mail </th>


                                    </tr>
                                 </thead>
                              
                              <tbody style="text-align: center;">
                                    <tr>
                                      <td class=""> {{$responsavel->nome}} </td>
                                      <td> {{$responsavel->cpf}} </td>
                                       <td> {{$responsavel->celular}} </td>
                                        <td> {{$responsavel->email}} </td>
                                    </tr>

                              </tbody>
                            
                              
                            </table>
                        </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            
                          </div>
                    </div>

                  </div>
                </div>

                    <!-- Model endereço Farmacia -->

                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".respend-example-modal-lg">Endereço do Responsável</button>

                     <div class="modal fade respend-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title">
                                <h5> <strong> Endereço do Responsável </strong> </h5>
                            </div>
            
                        </div>
                         <div class="table-responsive">
                            <table class="table">
                                <thead style="background-color: rgba(0,0,0,.03); text-align: center;">
                                    <tr>
                                      <th>CEP</th>
                                      <th> Lougradouro </th>
                                       <th> Bairro </th>
                                        <th> Complemento </th>
                                          <th> Número </th>
                                            <th> Estado </th>
                                            <th> Cidade </th>


                                    </tr>
                                 </thead>
                              
                              <tbody style="text-align: center;">
                              <tr>
                                  <td class=""> {{$responsavel->cep}} </td>
                                  <td> {{$responsavel->logradouro}} </td>
                                  <td> {{$responsavel->bairro}} </td>
                                  <td> {{$responsavel->complemento}} </td>
                                  <td>{{$responsavel->numero}} </td>
                                  <td>
                                      <?php
                                      $estado = \App\State::findOrFail($responsavel->states_id);
                                      echo $estado->name;
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      $cidade = \App\Citie::findOrFail($responsavel->cities_id);
                                      echo $cidade->name;
                                      ?>
                                  </td>
                              </tr>

                              </tbody>
                            
                              
                            </table>
                        </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            
                          </div>
                    </div>

                  </div>
                  </div>
              </div>
                
                <!-- FIM MODEL -->

                </div>
            </div>

                            <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                     <br>
						<div class="float-right">
                            <button class="btn btn-primary"><a href="/processos/{{$envio->processos_id}}/verificar" style="color: #fff; text-decoration: none;">Voltar</a>
                            </button>
							
						</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection