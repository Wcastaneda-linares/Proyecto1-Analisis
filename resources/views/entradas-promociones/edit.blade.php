@extends('layouts.app')

<title>Editar Entrada / Promoción</title>
<style>
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

    <div class="container">
        <h1>Editar Entrada/Promoción</h1>
        @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('EntradaPromocion')))
        <form method="POST" action="{{ route('entradas-promociones.update', ['id' => $entradas_promociones->id]) }}">
            @csrf
            @method('PUT') {{-- Usamos PUT para actualizar el registro --}}
            
            <!-- Campos de edición -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $entradas_promociones->nombre }}">
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{ $entradas_promociones->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $entradas_promociones->fecha_inicio }}">
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $entradas_promociones->fecha_fin }}">
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" class="form-control" value="{{ $entradas_promociones->precio }}">
            </div>
            
            <!-- Otros campos a editar -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
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
