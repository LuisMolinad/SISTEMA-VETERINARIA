@extends('app')

@section('titulo')
Gestionar Limpieza Dental
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
<h2 class="header">Gestionar citas de Limpieza Dental de {{ $mascotas->nombreMascota }} ID: {{ $mascotas->idMascota }}</h2>
@endsection

@section('content')

<div class="table-responsive-sm container-fluid contenedor">
    <table class="table table-striped" id="catalogomascota">
        <thead class="table-dark table-header">
            <tr>
                <th scope="col">Fecha para realizar limpieza dental</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <!--Lo obtengo por medio de su relación-->
            @foreach ($mascotas->citaLimpiezaDental as $cita)
                <tr>
                    <td>{{$cita->start}}</td>
                    <td id="actions">
                        <a href="{{ route('GestionLimpieza.show', [$mascotas->id, 'citaLimpieza_id' => $cita->id]) }}"><button type="button" class="btn btn-info">Consultar</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>

</div>

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#catalogomascota').DataTable({
                "lengthMenu":[[5,10,25,-1],[5,10,25,"Todos"]],
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