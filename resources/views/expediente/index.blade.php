@extends('app')

@section('titulo')
GESTIONAR EXPEDIENTE
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- Llamamos al sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Llamamos nuestro documento de sweetalert -->
<script src="{{asset('js/eliminar_sweetalert2.js')}}"></script>

<script src=" {{asset('js/file_query_server.js')}} "></script>
@endsection

@section('header')
<h1 ondblclick="random_creador()" class="header">GESTIONAR EXPEDIENTE</h1>
@endsection

@section('content')

    @include('layouts.notificacion')

    <div class="table-responsive-sm container-fluid contenedor">
        <table class="table table-striped" style="width:100%" id="expediente">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">ID Mascota</th>
                <th scope="col">Nombre Mascota</th>
                <th scope="col">Dueño</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expedientes as $expediente)
                <tr
                    <?php
                        if($expediente->mascota->fallecidoMascota == 'Fallecido'){
                            echo 'class="fallecido"';
                            echo 'style="background-color:#34495E;"';
                        }
                    ?>
                >
                    <td>{{$expediente->mascota->idMascota}}</td>
                    <td>{{$expediente->mascota->nombreMascota}}</td>
                    <td>{{$expediente->mascota->propietario->nombrePropietario}}</td>
                    <td id = "botones-linea">
                       {{-- <a href="{{ url('/expediente/'.$expediente->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a> --}}
                       <a href="{{ url('/record?i='.$expediente->id) }}"><button type="button" class="btn btn-success">Record vacunacion</button></a>
                       <a href="{{ route('historialmedico.index', $expediente->id) }}"><button type="button" 
                        class="btn btn-warning" style="background-color: #06806A; color:#fff; border-color:#06806A">Historial Medico</button></a>
                       
                       <a href="/exped/{{$expediente->id}}" class="btn btn-success">{{__('Reporte')}}</a>
                       
                       <a href="/expediente/examenes/{{$expediente->id}}" class="btn btn-primary">{{__('Examenes')}}</a>

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
            $('#expediente').DataTable({
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
