@extends('layouts.app')
<title>Editar Limpiezas</title>
<style>
th {
    background-color: #3498db; /* Cambia el color de fondo a tu preferencia */
    color: #000; /* Cambia el color del texto a negro */
    padding: 10px; /* Espaciado interno */
    text-align: left; /* Alineación del texto */
    border-bottom: 2px solid #ddd; /* Borde inferior */
    font-weight: bold; /* Negritas */
}

/* Estilo para la cabecera de la tabla con fondo */
.table-header {
    background-color: #3498db; /* Cambia el color de fondo a tu preferencia */
    color: #000; /* Cambia el color del texto a negro */
    padding: 15px; /* Espaciado interno */
    font-weight: bold; /* Negritas */
}
.table th{
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ccc;
    color: black;
    vertical-align: middle;
}
.table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
    color: black;
    vertical-align: middle;
}
    /* Estilos para el encabezado */
h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

/* Estilos para el formulario */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>

@section('content')
    <h1>Editar Limpieza</h1>
    @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Limpieza')))
    <form method="POST" action="{{ route('limpieza.update', ['id' => $limpieza->id]) }}">
        @csrf
        @method('PUT') {{-- Usamos PUT para actualizar el registro --}}
        
        <!-- Campos de edición -->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $limpieza->nombre }}">
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion">{{ $limpieza->descripcion }}</textarea>
        </div>
<!--
        <div class="form-group">
    <label for="fecha_realizacion">Fecha de Realización:</label>
    <input type="text" name="fecha_realizacion" id="fecha_realizacion" value="{{ $limpieza->fecha_realizacion }}">
</div>
-->

        <button type="submit">Guardar Cambios</button>
    </form>
    @else
    <h1 style="color: red">No tiene permisos en este sitio</h1>
    <script>
        // Espera 4 segundos (4000 milisegundos) y luego redirige
        setTimeout(function() {
            window.location.href = '{{ route('home') }}';
        }, 4000);
    </script>
    @endif
@endsection
