
@extends('layouts.app')

<title>Distribuciones</title>

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
    text-align: center;
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
    <h1>Lista de Distribuciones</h1>
    @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Distribuidor')))
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Fecha de Entrega</th>
                    <th>Proveedor</th>
                    <th>Destino</th>
                    <th>Tamaño Cisterna</th>
                    <th>Creado</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($distribuciones as $distribucion)
                    <tr>
                        <td>{{ $distribucion->id }}</td>
                        <td>{{ $distribucion->nombre }}</td>
                        <td>{{ $distribucion->cantidad }}</td>
                        <td>{{ $distribucion->fecha_entrega }}</td>
                        <td>{{ $distribucion->proveedor }}</td>
                        <td>{{ $distribucion->destino }}</td>
                        <td>{{ $distribucion->tamano_cisterna }}</td>
                        <td>{{ $distribucion->created_at }}</td>
                        <td><a href="{{ route('distribucion.edit', ['id' => $distribucion->id]) }}" class="btn btn-secondary">Editar</a></td>

                        <td>
                            <form method="POST" action="{{ route('distribucion.destroy', ['id' => $distribucion->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta distribucion?')">Eliminar</button>
                            </form>
                        </td>

                    </tr>
             @endforeach
            </tbody>
        </table>
        <br>
        <div class="mt-6 flex justify-center">
            <button type="button" onclick="window.location.href='{{ route('create/distribucion') }}'" class="btn btn-primary">Registrar Nueva Distribucion</button>
            <button type="button" onclick="window.location.href='{{ route('exportar/distribucion') }}'" class="btn btn-success">Generar Reporte Excel</button>
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


