@extends('app')

@section('titulo')
Gestionar limpieza dental
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <h1 class="header">Gestionar citas de Limpieza dental</h1>
@endsection

@section('content')


<div class="table-responsive-sm container-fluid contenedor">

    <table class="table table-striped" id="citaLimpieza">
        <thead class="table-dark table-header">
            <th scope="col">ID Mascota</th>
            <th scope="col">Nombre</th>
            <th scope="col">Dueño</th>
            <th scope="col">Número</th>
            <th scope="col">Dirección</th>
            <!--Esta ultima para los botones-->
            <th scope="col"></th>
        </thead>

        <tbody>
            <!--Extraemos los datos de la tabla mascota-->
            @foreach ($mascotas as $mascota)
            <tr>
                <th scope="id">{{$mascota->idMascota}}</th>
                <td id="nombremascota">{{$mascota->nombreMascota}}</td>
                <td id="nombrepropietario">{{$mascota->propietario->nombrePropietario}}</td>
                <td id="telefonopropietario">{{$mascota->propietario->telefonoPropietario}}</td>
                <td id="direccionpropietario">{{$mascota->propietario->direccionPropietario}}</td>
                <td>
                    <!--Verifico el estado de la mascota-->
                    @if($mascota->fallecidoMascota == 'Vivo')
                    <a role="button" class="btn btn-success" href={{ url('/crearCitaLimpiezaDental/'.$mascota->id) }}>Crear</a>
                    @endif
                    <a href="{{ route('GestionLimpieza.index', $mascota->id) }}"><button type="button" class="btn btn-dark">Gestionar</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!--Configuraciones del datatable-->
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#citaLimpieza').DataTable({
                "lengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "Todos"]
                ],

                "language": {
                    "lengthMenu": "Mostrar _MENU_ records por página",
                    "zeroRecords": "No se encuentran datos relacionados found - ",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search':'Buscar',
                    'paginate': {
                        'first':      'Primero',
                        'last':       'Ultimo',
                        'next':      'Siguiente',
                        'previous':  'Anterior',
                    },

                },
            });


        });
    </script>
@endsection
