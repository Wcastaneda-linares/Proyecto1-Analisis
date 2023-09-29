<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Distribuidora SuperGas</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->


    <link rel="icon" type="image/jpg" href="/imagenico.jpg"/>


    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Agrega los estilos de Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Agrega jQuery (requerido por Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Agrega los scripts de Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Distribuidora SuperGas
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">


    </div>
</nav>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item {{ request()->routeIs('home') ? 'active-page' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('limpieza') ? 'active-page' : '' }}">
                                <a class="nav-link" href="{{ route('limpieza') }}">Gestión de Limpieza</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('distribucion') ? 'active-page' : '' }}">
                                <a class="nav-link" href="{{ route('distribucion') }}">Gestión de Distribución</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('entrada-promocion') ? 'active-page' : '' }}">
                                <a class="nav-link" href="{{ route('entrada-promocion') }}">Gestión de Entradas y Promociones</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('recursohumano') ? 'active-page' : '' }}">
                                <a class="nav-link" href="{{ route('recursohumano') }}">Gestión de Recursos Humanos</a>
                            </li>
                        </ul>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar la Sesión') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
