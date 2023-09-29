<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" type="image/jpg" href="/imagenico.jpg"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
    /* Estilos generales para dispositivos más grandes */
/* Puedes mantener tus estilos actuales aquí */

/* Estilos específicos para dispositivos más pequeños (como smartphones) */
@media (max-width: 767px) {
    /* Agrega estilos específicos para dispositivos pequeños aquí */
    .container {
        padding: 20px; /* Ejemplo: reducir el espaciado en dispositivos pequeños */
    }

    .main-text {
        font-size: 18px; /* Ejemplo: reduce el tamaño de fuente en dispositivos pequeños */
    }

    /* Agrega más estilos según sea necesario para dispositivos pequeños */
    
    /* Estilos para la imagen en dispositivos pequeños */
    .imagen-contenedor {
        padding: 20px; /* Ejemplo: reducir el espaciado */
        height: auto; /* Ajustar la altura automáticamente */
    }
}

        /* Estilos para los botones */
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007BFF; /* Color de fondo del botón de Iniciar Sesión */
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
}

.button:hover {
    background-color: #0056b3; /* Cambia el color de fondo al pasar el cursor sobre el botón */
}

.button.secondary {
    background-color: #28a745; /* Color de fondo del botón de Registrarse */
}

.button.secondary:hover {
    background-color: #1a891d; /* Cambia el color de fondo al pasar el cursor sobre el botón de Registrarse */
}

/* Estilos para el contenedor principal */
.container {
    text-align: center;
    padding: 50px;
    background: #f0f0f0;
}

/* Estilos para el texto principal */
.main-text {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Estilos para los enlaces de navegación */
.nav-link {
    text-decoration: none;
    color: #007BFF; /* Color del enlace de Iniciar Sesión */
    font-weight: bold;
    margin-right: 20px;
}

.nav-link:hover {
    text-decoration: underline; /* Subraya el enlace al pasar el cursor */
}

.nav-link.secondary {
    color: #28a745; /* Color del enlace de Registrarse */
}

.imagen-contenedor {
    display: flex;
    padding: 75px;
    justify-content: center;
    align-items: center;
    height: 50vh; /* Ajusta la altura según tus necesidades */
}
                img {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 100%;
                }

        </style>
</head>
<!--
<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-50 sm:right-500 p-6 text-center z-10">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sesíon</a>
                    <br>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrare</a>
                    @endif
                @endauth
            </div>
        @endif


    </div>
</body>
-->
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-50 sm:right-500 p-6 text-center z-10 container">
                <p class="main-text">Distribuidora SuperGas</p>
                <p class="main-text">Bienvenido</p>
                @auth
                    <a href="{{ url('/home') }}" class="nav-link">Home</a>
                @else
                    <a href="{{ route('login') }}" class="button">Iniciar Sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button secondary">Registrarse</a>
                    @endif
                @endauth
                <div class="imagen-contenedor">
                <img src="{{ asset('1.jpg') }}" alt="Mi Imagen" height="100%">
            </div>
            </div>
        @endif


    </div>
</body>



</html>
