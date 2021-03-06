<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script src="http://digitalbush.com/files/jquery/maskedinput/rc3/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
    jQuery(function($){
       
       $("#cnpj").mask("99.999.999/9999-99");
       $("#fixo").mask("(99)9999-9999");
       $("#celular").mask("(99)99999-9999");
       $("#cep").mask("99999-999");
       $("#cpf").mask("999.999.999-99");

    });

    </script>

    

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand navbar fix-top" href="{{ url('/') }}">
                     Sin Credenciamento
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                        @if (!Auth::guest())
                        <li> <a class="nav-link" href="{{url('/home')}}"> Home </a> </li>
                        <div class="btn-group">
                          <a  class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Governo
                          </a>
                          <div class="dropdown-menu">
                            <li> 
                                <a class="nav-link" href="{{url('/processos/')}}"> Processos </a></li>
                           
                             <li> <a class="nav-link" href="{{url('/farmacias')}}"> Farmácias </a></li>
                            
                          </div>
                        </div>
                        <div class="btn-group">
                          <a  class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Farmacêutico
                          </a>
                          <div class="dropdown-menu">
                    
                                <li>

                                <a class="nav-link" href="/dados/farm"> Dados da Farmácia </a></li>
                                 <li> 
                                <a class="nav-link" href="/lista-responsavel"> Lista de Responsavéis </a></li>

                            
                          </div>
                        </div>
                        <div class="btn-group">
                          <a  class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Responsável
                          </a>
                          <div class="dropdown-menu">
                           <li> 
                                <a class="nav-link" href="{{url('/processos/andamento')}}"> Processos em Andamento </a></li>

                            
                          </div>
                        </div>
                        

                       

                         
                        @endif

                        

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-user"></i>
                                    {{ __('Entrar') }}
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus"></i>
                                    {{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                        <i class="fas fa-sign-out-alt" style="float: right; margin-top: 5px;"></i>

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>


    </div>
    <!-- Footer --> <div class="container">
<footer class="card-footer bg-light footer-font-style text-muted footer-position">
   

  <!-- Copyright --><br>
  <div class="footer-marginr" style="text-align: center;"> <strong> © 2018 Copyright: </strong>
      <a href="http://www.infortechms.com.br" target="_blank"> www.infortechms.com.br </a>
  </div>
  <!-- Copyright -->
</footer>
</div>

<!-- Footer -->
</body>
</html>
