@extends('layouts.app')
<title>Crear Empleado</title>
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
    <div class="container">
        <div class="form-container flex justify-center">
            <h1 style="text-align: center">Gestión de Recursos Humanos</h1>
        @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('RecursosHumanos')))
            <form method="POST" action="{{ route('recursos-humanos.store') }}" class="flex justify-center">
                @csrf

                <!-- Campo para ingresar el nombre del empleado -->
                <div class="form-group">
                    <label for="nombre">Nombre del Empleado:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <!-- Campo para ingresar el cargo -->
                <div class="form-group">
                    <label for="cargo">Cargo:</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" required>
                </div>

                <!-- Campo para ingresar el salario -->
                <div class="form-group">
                    <label for="salario">Salario:</label>
                    <input type="number" name="salario" id="salario" class="form-control" step="0.01" required>
                </div>

                <!-- Campo para ingresar la fecha de contratación -->
                <div class="form-group">
                    <label for="fecha_contratacion">Fecha de Contratación:</label>
                    <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" required>
                </div>
                <br>
                <!-- Botón para guardar el empleado -->
                <button type="submit" class="btn btn-primary">Guardar Empleado</button>
            </form>
                <div class="mt-6 flex justify-center">
            <button type="button" onclick="window.location.href='{{ route('recursohumano') }}'" class="btn-ver-limpiezas">Ver Lista de Empleados</button>
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
        </div>
    </div>
@endsection
