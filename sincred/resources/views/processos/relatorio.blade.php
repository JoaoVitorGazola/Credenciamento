@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header"> <h2>Relatório </h2>
                	<br>
                   
                    

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <br>

                    <h2> Relatório Final</h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                    

                     <div class="row">
                     	<div class="col-lg-3 col-sm-12">
                     		<nav id="navarVertical" class="navbar navbar-light bg-light">
                     			<nav class="nav nav-pills flex-column">
                     				
                     				<a href="#item1" class="nav-link"> Documento 1</a>
                     				<a href="#item2" class="nav-link"> Documento 2</a>
                     				<a href="#item3" class="nav-link"> Documento 3</a>
                     				<a href="#item4" class="nav-link"> Documento 4</a>
                     			</nav>
                     		</nav>
                     		
                     	</div>
                     	<div class="col-lg-9 col-sm-12">
                     		<div data-spy="scroll" data-targget="#navbarVertical" data-offset="0" style="height: 160px; position: relative; overflow: auto;">
                     			<h4 id="item1"> Documento 1 </h4>
                     			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. </p>

                     			<h4 id="item2"> Documento 2 </h4>
                     			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. </p>

                     			<h4 id="item3"> Documento 3 </h4>
                     			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. </p>

                     			<h4 id="item4"> Documento 4 </h4>
                     			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus scelerisque lacus, quis fringilla purus vehicula eget. Cras at dignissim est. Aliquam bibendum porta bibendum. </p>
                     			
                     		</div>
                     	</div>
                     	

                     </div>
                     <br>
                     <button class="btn btn-primary"><a href="" style="color: #fff; text-decoration: none;">Download</a>
                     </button>
                     <button class="btn btn-danger"><a href="" style="color: #fff; text-decoration: none;">Reprovar</a>
                     </button>
                      <button class="btn btn-success"><a href="" style="color: #fff; text-decoration: none;">Aprovar</a>
                     </button>
                     <br>
                     <br>
                     <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
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
                                       <th> Telefone </th>
                                        <th> E-mail </th>


                                    </tr>
                                 </thead>
                              
                              <tbody style="text-align: center;">
                                    <tr>
                                      <td class=""> Exemplo  </td>
                                      <td> 11111111 </td>
                                       <td> 1111111 </td>
                                        <td> exemplo@exemplo </td>
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
                                      <td class=""> 790600-300 </td>
                                      <td> Rua Doutor Werneck </td>
                                       <td> Vila Albuquerque </td>
                                        <td> testeeeeeeeeeeeeeee </td>
                                        <td>11 </td>
                                        <td> MS </td>
                                        <td> Campo Grande </td>
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
                                      <td class=""> Exemplo  </td>
                                      <td> 11111111 </td>
                                       <td> 1111111 </td>
                                        <td> exemplo@exemplo </td>
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
                                      <td class=""> 790600-300 </td>
                                      <td> Rua Doutor Werneck </td>
                                       <td> Vila Albuquerque </td>
                                        <td> testeeeeeeeeeeeeeee </td>
                                        <td>11 </td>
                                        <td> MS </td>
                                        <td> Campo Grande </td>
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
                            <button class="btn btn-primary"><a href="#" style="color: #fff; text-decoration: none;">Voltar</a>
                            </button>
							
						</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection