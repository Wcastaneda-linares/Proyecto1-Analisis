<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Styles -->
    <style>
        /* Estilos para la navegación */
.navbar {
    background-color: #333; /* Color de fondo del menú de navegación */
    padding: 10px 0;
}

.menu-toggle {
    display: none; /* Oculta la casilla de verificación en pantallas grandes */
}

.menu-icon {
    font-size: 24px;
    cursor: pointer;
    color: #fff;
    display: none; /* Oculta el icono de menú en pantallas grandes */
}

.nav-list {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

.nav-list li {
    display: inline-block;
    margin-right: 20px;
}

.nav-list a {
    text-decoration: none;
    color: #fff; /* Color de texto de los enlaces */
    font-weight: bold;
    font-size: 16px;
    transition: color 0.3s ease;
    padding: 10px 20px; /* Espaciado en los enlaces */
    border-radius: 5px; /* Esquinas redondeadas en los enlaces */
    display: block; /* Aseguramos que los enlaces ocupen todo el ancho disponible */
}

a.active {
    background-color: #007BFF; /* Color de fondo para el enlace activo */
    color: #fff; /* Color de texto para el enlace activo */
}

a:hover {
    color: #1a891d; /* Color de texto al pasar el cursor sobre los enlaces */
}

/* Media query para pantallas pequeñas (ejemplo: dispositivos móviles) */
@media (max-width: 768px) {
    .menu-toggle {
        display: block; /* Muestra la casilla de verificación en pantallas pequeñas */
    }

    .menu-icon {
        display: block; /* Muestra el icono de menú en pantallas pequeñas */
    }

    .nav-list {
        display: none; /* Oculta la lista de navegación en pantallas pequeñas */
        flex-direction: column; /* Elementos de la lista en columna */
        position: absolute;
        top: 50px;
        left: 0;
        right: 0;
        background-color: #333;
        z-index: 1;
        text-align: left;
    }

    .menu-toggle:checked + .menu-icon + .nav-list {
        display: block; /* Muestra la lista cuando la casilla de verificación está marcada */
    }

    .nav-list li {
        margin: 0;
        padding: 10px 20px;
    }
}

    </style>
</head>




</html>

