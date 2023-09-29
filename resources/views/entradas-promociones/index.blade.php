@extends('layouts.app')
<title>Entradas y Promociones</title>
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
    <div class="container">
        <h1>Lista de Entradas y Promociones</h1>
        @if(Auth::check() && (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('EntradaPromocion')))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Precio</th>
                    <th>Creado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($entradas_promociones as $entrada_promocion)
                    <tr>
                        <td>{{ $entrada_promocion->id}}</td>
                        <td>{{ $entrada_promocion->nombre}}</td>
                        <td>{{ $entrada_promocion->descripcion}}</td>
                        <td>{{ $entrada_promocion->fecha_inicio}}</td>
                        <td>{{ $entrada_promocion->fecha_fin}}</td>
                        <td>{{ $entrada_promocion->precio}}</td>
                        <td>{{ $entrada_promocion->created_at}}</td>
                        <td>
                            <a href="{{ route('entradas-promociones.edit', ['id' => $entrada_promocion->id]) }}"
                               class="btn btn-secondary">Editar</a>
                        </td>
                        <td>
                            <form method="POST"
                                  action="{{ route('entradas-promociones.destroy', ['id' => $entrada_promocion->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta entrada/promoción?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div class="mt-6 flex justify-center">
            <button type="button" onclick="window.location.href='{{ route('entradas-promociones.create') }}'" class="btn btn-primary">Registrar Entrada/Promoción</button>
            <button type="button" onclick="window.location.href='{{ route('exportar/entradas/promociones') }}'" class="btn btn-success">Generar Excel</button>
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
