@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"> <h2> Dados da Farmácia : Exemplo </h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead style="background-color: rgba(0,0,0,.03);">
								<tr>
									<th>E-mail </th>
									<th>Telefone Fixo </th>
									<th>Telefone Celular </th>
									<th>Ação </th>

								</tr>
								</thead>
								
									<tbody>
									<td>infortechms@gmail.com</td>
										<td >(00)0000-0000  </td>
										<td>(00)00000-0000 </td>
										<td> 
											<a href="/editar-farm">Editar

											</a>
											  </td>


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
