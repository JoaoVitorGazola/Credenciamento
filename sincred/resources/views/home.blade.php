@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"> <h2> Dashboard </h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <H5> Você está logado! {{date('d/m/y')}} </H5>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
