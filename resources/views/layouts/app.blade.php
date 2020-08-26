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
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
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
                    <ul class="navbar-nav justify-content-end w-100" style="font-size: 20px">
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
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link text-center" style="color:#000" href="{{ route('login') }}">Empleados</a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            @if(Auth::user()->admin == 333 || Auth::user()->tecnic == 222 )
                            <div class="dropdown-menu dropdown-menu-right text-dark bg-light" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color:black !important;" href="{{route('admin')}}">Panel</a>
                                <a class="dropdown-item" style="color:black !important;" href="{{route('register')}}">Registrar nuevo usuario</a>
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

        <main class="pb-3">
            @yield('content')
        </main>
        <footer id="footer" class=" bg-white footer mt-auto pt-2 pb-0 shadow-lg" style="display:block">
            <div class="col-12 mx-auto">
                <div class="row justify-content-around">
                    <div class="col-12 col-md-3 p-3 text-center align-self-center order-md-1">
                        <img src="{{asset('/storage/logo.jpg')}}" class="w-50" alt="">
                    </div>
                    <div class="col-12 col-md-3 p-3 text-center align-self-center order-md-2 order-3">
                        <div class="d-flex mb-2 justify-content-center"><span class="material-icons" style="color:#cc041c">location_on</span><a href="https://goo.gl/maps/p5YXaMh7RQGJT1H67" class="font-weight-bold" style="color:#252457;margin-top: 2px">Cortijo los cañas 1, Rincón de la Victoria, Málaga, España.</a></div>
                        <div class="d-flex mb-2 justify-content-center"><span class="material-icons" style="color:#cc041c">alarm</span><span class="font-weight-bold" style="color:#252457;margin-top: 2px">Lunes a Viernes ||</> 9:00-14:00hs || 16:00-19:00hs</span></div>
                        <div class="d-flex mb-2 justify-content-center"><span class="material-icons" style="color:#cc041c">mail_outline</span><a href="mailto:hosteleriagarces@hotmail.es" class="font-weight-bold" style="color:#252457;margin-top: 2px">hosteleriagarces@hotmail.es</a></div>
                        <div class="d-flex mb-2 justify-content-center"><span class="material-icons" style="color:#cc041c">mail_outline</span><a href="cyhgarces@hotmail.com" class="font-weight-bold" style="color:#252457;margin-top: 2px">cyhgarces@hotmail.com</a></div>
                        <div class="d-flex mb-2 justify-content-center"><span class="material-icons" style="color:#cc041c">phone</span><span class="font-weight-bold" style="color:#252457;margin-top: 2px">691526643</span></div>
                    </div>
                    <div class="col-12 col-md-3 p-3 text-center align-self-center order-md-3">
                        <img src="{{asset('/storage/logo andalucia.png')}}" class="w-75" alt="">
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('js/choice.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
