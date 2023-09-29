
@extends('layouts.app')

<title>Limpiezas</title>

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

    /* Estilos para el encabezado */
h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

/* Estilos para la tabla */
.container {
    max-width: 800px;
    margin: 0 auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
    text-align: center;
    border-bottom: 1px solid #ccc;
    color: black;
    vertical-align: middle;
}



/* Estilos para las filas impares de la tabla */
.table tbody tr:nth-child(odd) {
    background-color: #f5f5f5;
}

/* Estilos para el botón de registro */
.btn-primary {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>


@section('content')
    <h1>Lista de limpiezas</h1>
    @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Limpieza')))
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Realización</th>
                    <th>Fecha de Creación</th>
                    <th>Última Actualización</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($limpiezas as $limpieza)
                    <tr>
                        <td>{{ $limpieza->id }}</td>
                        <td>{{ $limpieza->nombre }}</td>
                        <td>{{ $limpieza->descripcion }}</td>
                        <td>{{ $limpieza->fecha_realizacion }}</td>
                        <td>{{ $limpieza->created_at }}</td>
                        <td>{{ $limpieza->updated_at }}</td>
                        <td><a href="{{ route('limpieza.edit', ['id' => $limpieza->id]) }}" class="btn btn-secondary">Editar</a></td>

                        <td>
                            <form method="POST" action="{{ route('limpieza.destroy', ['id' => $limpieza->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta limpieza?')">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div class="mt-6 flex justify-center">
            <button type="button" onclick="window.location.href='{{ route('create/limpieza') }}'" class="btn btn-primary">Registrar Nueva Limpieza</button>
            <button type="button" onclick="window.location.href='{{ route('exportar/limpieza') }}'" class="btn btn-success">Generar Excel</button>

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


