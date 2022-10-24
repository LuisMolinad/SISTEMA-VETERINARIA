@extends('app')

@section('titulo')
GESTIONAR MASCOTA
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- Llamamos al sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Llamamos nuestro documento de sweetalert -->
<script src="{{asset('js/eliminar_sweetalert2.js')}}"></script>
@endsection

@section('header')
<h1 class="header">GESTIONAR MASCOTA</h1>
@endsection

@section('content')

    @include('layouts.notificacion')

    <div class="table-responsive-sm container-fluid contenedor">
        <table class="table table-striped"  id="mascota">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Codigo</th>
                <th scope="col">Propietario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Raza</th>
                <th scope="col">Especie</th>
                <th scope="col">Color</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mascotas as $mascota)
                <tr>
                    <td>{{$mascota->id}}</td>
                    <td>{{$mascota->idMascota}}</td>
                    <td>{{$mascota->propietario->nombrePropietario}}</td>
                    <td>{{$mascota->nombreMascota}}</td>
                    <td>{{$mascota->razaMascota}}</td>
                    <td>{{$mascota->especie->nombreEspecie}}</td>
                    <td>{{$mascota->colorMascota}}</td>
                    <td id = "botones-linea">
                        <a href="{{ url('/mascota/'.$mascota->id) }}"><button type="button" class="btn btn-primary">Consultar</button></a>
                        
                        @can('editar-Mascota')
                        <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                        @endcan

                        @can('borrar-Mascota')
                        <form id="EditForm{{$mascota->id}}" action="{{url('/mascota/'.$mascota->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_general('{{$mascota->nombreMascota}}','{{$mascota->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        @endcan

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
            $('#mascota').DataTable({
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
