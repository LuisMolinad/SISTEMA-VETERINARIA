@extends('app')

@section('titulo')
GESTIONAR PROPIETARIO
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
<h1 class="header">GESTIONAR PROPIETARIO</h1>
@endsection

@section('content')

    @include('layouts.notificacion')

    <div class="table-responsive-sm container-fluid contenedor">
        <div class="boton crear container_btn_hend">
        
        @can('crear-Propietario')
        <a href="/propietario/create"><button type="button" class="btn btn-success boton_crear">Crear propietario</button></a>
        @endcan

        </div>
        <table class="table table-striped" style="width:100%">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Dueño</th>
                <th scope="col">Número</th>
                <th scope="col">Dirección</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propietarios as $propietario)
                <tr>
                    <td>{{$propietario->id}}</td>
                    <td>{{$propietario->nombrePropietario}}</td>
                    <td>{{$propietario->telefonoPropietario}}</td>
                    <td>{{$propietario->direccionPropietario}}</td>
                    <td id = "botones-linea">
                        <a href="{{ route('propietario.show',$propietario->id) }}"><button type="button" class="btn btn-info">Consultar</button></a>   
                        
                        @can('editar-Propietario')
                        <a href="{{ url('/propietario/'.$propietario->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                        @endcan

                        @can('borrar-Propietario')
                        <form id="EditForm{{$propietario->id}}" action="{{url('/propietario/'.$propietario->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_propietario('{{$propietario->nombrePropietario}}','{{$propietario->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        @endcan

                        @can('crear-Mascota')
                        <a href="/mascota/create/{{$propietario->id}}"><button type="button" class="btn btn-success">Crear mascota</button></a>
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
            $('#propietario').DataTable({
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
