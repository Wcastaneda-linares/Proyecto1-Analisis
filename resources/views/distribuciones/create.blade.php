@extends('layouts.app')
<title>Crear Distribución</title>
<style>
    /* Estilos para el formulario */
.form-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-weight: bold;
    margin-bottom: 6px;
    color: #333;
}

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
}

.form-textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    resize: vertical;
}

.form-button {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-button:hover {
    background-color: #0056b3;
}

/* Estilos para el botón de ver limpiezas */
.btn-ver-limpiezas {
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-ver-limpiezas:hover {
    background-color: #1a891d;
}

</style>
@section('content')

@if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Distribuidor')))
    <div class="container">
    <div class="form-container flex justify-centerS">
        <h1>Crear de Distribución</h1>
        
        <form method="POST" action="{{ route('distribuciones.store') }}" class="flex justify-center">
            @csrf

            <!-- Campo para ingresar el nombre del producto -->
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <!-- Campo para ingresar la cantidad disponible -->
            <div class="form-group">
                <label for="cantidad">Cantidad Disponible:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>

            <!-- Campo para ingresar la fecha de entrega -->
            <div class="form-group">
                <label for="fecha_entrega">Fecha de Entrega:</label>
                <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" required>
            </div>

            <!-- Campo para ingresar el proveedor -->
            <div class="form-group">
                <label for="proveedor">Proveedor:</label>
                <input type="text" name="proveedor" id="proveedor" class="form-control" required>
            </div>

            <!-- Campo para ingresar el destino -->
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" name="destino" id="destino" class="form-control" required>
            </div>

            <!-- Campo para ingresar el tamaño de la cisterna -->
            <div class="form-group">
                <label for="tamano_cisterna">Tamaño de la Cisterna:</label>
                <input type="number" name="tamano_cisterna" id="tamano_cisterna" class="form-control" required>
            </div>
            <br>
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Guardar Distribución</button>
        </form>
        
        <div class="mt-6 flex justify-center">
            <button type="button" onclick="window.location.href='{{ route('distribucion') }}'" class="btn-ver-limpiezas">Ver Distribuciones</button>
        </div>
    </div>
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

