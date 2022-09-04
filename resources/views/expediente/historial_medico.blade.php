@extends('app')

@section('titulo')
Historial Medico
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <h1 class="header">Historial de la Mascota {{$expediente->mascota->nombreMascota}} - ID Mascota: {{$expediente->mascota->idMascota}}</h1>
@endsection

@section('content')
    <div class="table-responsive-sm container-fluid contenedor">
        <table class="table table-striped" id="tarjetahistorial">
            <thead class="table-dark table-header">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Diagnostico</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <!--Obtengo el valor de la linea de historial de la base de datos-->
            @foreach ($expediente->HistorialMedico as $lineaHistorial)
                <tr>
                    <td>{{$lineaHistorial->fechaLineaHistorial}}</td>
                    <td>{{$lineaHistorial->textoLineaHistorial}}</td>
                    <td></td>
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
            $('#tarjetahistorial').DataTable({
                "lengthMenu":[[5,10,25,-1],[5,10,25,"Todos"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ records por página",
                    "zeroRecords": "No se encuentran datos relacionados ",
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

