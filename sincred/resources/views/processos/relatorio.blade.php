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

                    <h2> Relatório Final </h2>

                    <li style="border-top: 2px #efefef solid; margin-top: 0px; margin-bottom: 0px; display: block;"> </li>
                    <br>

                     
                        {!!Form::open(['url'=>'/'])!!}
                        <div class="row">
                            
                            <div class="col-lg-3 col-sm-3 col-md-3">
                            {!! Form::label('farmacia', 'Farmácia') !!}
                            {!! Form::input('text', 'farmacia', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Farmácia Popular','readonly' ]) !!}
                            </div>
                            
                            <div class="col-sm-3 col-lg-3 col-md-3">
                                {!! Form::label('nome', 'Responsável') !!}

                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Luiz Marcelo', 'readonly']) !!}
                            </div>

                            <div class="col-sm-6 col-lg-6 col-md-6">
                                {!! Form::label('obs', 'Observações') !!}
                            {!! Form::input('text', 'obs', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Observações', 'readonly']) !!}

							<br>
                            </div>




                     </div>
                     <br>
                     <br>

                     <div class="row">
                     	<div class="col-3">
                     		<nav id="navarVertical" class="navbar navbar-light bg-light">
                     			<nav class="nav nav-pills flex-column">
                     				
                     				<a href="#item1" class="nav-link"> Documento 1</a>
                     				<a href="#item2" class="nav-link"> Documento 2</a>
                     				<a href="#item3" class="nav-link"> Documento 3</a>
                     				<a href="#item4" class="nav-link"> Documento 4</a>
                     			</nav>
                     		</nav>
                     		
                     	</div>
                     	<div class="col-9">
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
                    
                   
					
					
					<br>	
						<div class="float-right">
                            <button class="btn btn-primary"><a href="#" style="color: #fff; text-decoration: none;">Voltar</a>
                            </button>

							

                            {!! Form::close() !!}


							
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection