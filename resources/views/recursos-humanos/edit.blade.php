@extends('layouts.app')
<title>Editar Empleado</title>
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
        <h1>Editar Empleado</h1>
        @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('RecursosHumanos')))
        <form method="POST" action="{{ route('recursos-humanos.update', ['id' => $recursos_humanos->id]) }}">
            @csrf
            @method('PUT') {{-- Usamos PUT para actualizar el registro --}}
            
            <!-- Campos de edición -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $recursos_humanos->nombre }}">
            </div>
            
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" id="cargo" class="form-control" value="{{ $recursos_humanos->cargo }}">
            </div>

            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="text" name="salario" id="salario" class="form-control" value="{{ $recursos_humanos->salario }}">
            </div>

            <div class="form-group">
                <label for="fecha_contratacion">Fecha de Contratación:</label>
                <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" value="{{ $recursos_humanos->fecha_contratacion }}">
            </div>
            
            <!-- Otros campos a editar -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
    </div>
@endsection
