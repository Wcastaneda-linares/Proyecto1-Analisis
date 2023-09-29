@extends('layouts.app')
<title>Crear Limpiezas</title>

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
@if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Limpieza')))
    <div class="form-container flex justify-centerS">
        <h1 class="form-title">Creación de limpiezas</h1>
        {{ session('success') }}
        <form method="POST" action="{{ route('limpieza') }}" class="flex justify-center">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="form-label">Nombre de la tarea de limpieza:</label>
                <input type="text" name="nombre" id="nombre" class="form-input" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea" required></textarea>
            </div>

            <div class="mb-4">
                <label for="fecha" class="form-label">Fecha de realización:</label>
                <input type="date" name="fecha" id="fecha" class="form-input" required>
            </div>

            <div class="mt-6 flex justify-center">
                <button type="submit" class="form-button">Guardar Limpieza</button>
            </div>
        </form>

        <div class="mt-6 flex justify-center">
            <button type="button" onclick="window.location.href='{{ route('limpieza') }}'" class="btn-ver-limpiezas">Ver Limpiezas</button>
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

