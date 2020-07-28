<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
            <div class="row w-100">
                <div class="col-6 col-md-4 col-lg-3">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('/storage/logo2.jpg')}}" class="w-100"  alt="image-logo">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <img src="{{asset('/storage/logo andalucia.png')}}" class="w-75" alt="">
                </div>
                <button class="navbar-toggler ml-auto bg-ligth mr-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse col-10 col-md-5 p-0 ml-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto" style="font-size: 20px">
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link text-center" style="color:#000" href="">Empresa</a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link text-center" style="color:#000" href="">Nuestros Trabajos</a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link text-center" style="color:#000" href="">Cotizar Trabajo</a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link text-center" style="color:#000" href="">Contacto</a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            @if(Auth::user()->admin == 325)
                            <div class="dropdown-menu dropdown-menu-right text-dark bg-light" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color:black !important;" href="{{route('admin')}}">Panel</a>
                                <a class="dropdown-item" style="color:black !important;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @endif
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
