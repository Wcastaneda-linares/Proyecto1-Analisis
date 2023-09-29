@extends('layouts.app')
<title>Editar Distribucion</title>
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
        <h1>Editar Distribución</h1>
        @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Distribuidor')))
        <form method="POST" action="{{ route('distribucion.update', ['id' => $distribucion->id]) }}">
            @csrf
            @method('PUT') <!-- Usamos PUT para actualizar el registro -->

            <!-- Campo para editar el nombre del producto -->
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $distribucion->nombre }}" required>
            </div>

            <!-- Campo para editar la cantidad disponible -->
            <div class="form-group">
                <label for="cantidad">Cantidad Disponible:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $distribucion->cantidad }}" required>
            </div>

            <!-- Campo para editar la fecha de entrega -->
            <div class="form-group">
                <label for="fecha_entrega">Fecha de Entrega:</label>
                <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" value="{{ $distribucion->fecha_entrega }}" required>
            </div>

            <!-- Campo para editar el proveedor -->
            <div class="form-group">
                <label for="proveedor">Proveedor:</label>
                <input type="text" name="proveedor" id="proveedor" class="form-control" value="{{ $distribucion->proveedor }}" required>
            </div>

            <!-- Campo para editar el destino -->
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" name="destino" id="destino" class="form-control" value="{{ $distribucion->destino }}" required>
            </div>

            <!-- Campo para editar el tamaño de la cisterna -->
            <div class="form-group">
                <label for="tamano_cisterna">Tamaño de la Cisterna:</label>
                <input type="number" name="tamano_cisterna" id="tamano_cisterna" class="form-control" value="{{ $distribucion->tamano_cisterna }}" required>
            </div>

            <!-- Botón para guardar los cambios -->
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

