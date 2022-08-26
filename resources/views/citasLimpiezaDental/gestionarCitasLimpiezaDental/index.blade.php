@extends('app')

@section('titulo')
Gestionar Limpieza Dental
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<!-- Llamamos al sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Llamamos nuestro documento de sweetalert -->
<script src="{{ asset('js/eliminar_sweetalert2.js') }}"></script>

@endsection

@section('header')
<h2 class="header">Gestionar citas de Limpieza Dental de {{ $mascotas->nombreMascota }} ID: {{ $mascotas->idMascota }}</h2>
@endsection

@section('content')

<!--Notificacion-->
@include('layouts.notificacion')

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
                        <form id="EditForm{{$cita->id}}"
                            action="{{ route('GestionLimpieza.delete', ['citaLimpieza_id' => $cita->id]) }}">

                            {{ method_field('DELETE') }}
                            <button onclick="return alerta_eliminar_citaLimpieza('{{ $cita->id }}')" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
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