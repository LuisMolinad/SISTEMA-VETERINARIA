@extends('app')

@section('titulo')
    GESTIONAR CIRUGIA
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
<h1 class="header">Gestionar citas de círugia de {{ $mascotas->nombreMascota }} ID: {{ $mascotas->idMascota }}</h1>
@endsection

@section('content')
    @include('layouts.notificacion')
    <div class="table-responsive-sm container-fluid contenedor">
        <table class="table table-striped" id="mascota">
            <thead class="table-dark table-header">
                <tr>
                    <th scope="col">Concepto de cirugía</th>
                    <th scope="col">Fecha de realización</th>
                    <th scope="col">Recomendaciones Preoperatorias</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                <tr>
                    <td>{{$dato->conceptoCirugia}}</td>
                    <td>{{$dato->start}}</td>
                    <td>{{$dato->recomendacionPreoOperatoria}}</td>
                    <td id = "botones-linea">
                    @can('crear-recetaPostoperatoria')
                         @if ($mascotas->fallecidoMascota == 'Vivo') 
                            <a href="{{ url('/citacirugia/crear_receta_postoperatoria/'.$dato->id)}}"> <button type="button" class="btn btn-primary">Receta Postoperatoria</button>
                        @endcan   
                            @can('consultar-Cirugia')
                                  <a href="{{ url('/citacirugia/consultarCitaCirugia/'.$dato->id)}}"><button type="button" class="btn btn-info">Consultar</button></a>
                            @endcan

                            @can('editar-Cirugia')                         
                            <a href="{{ url('/citacirugia/editarCitaCirugia/'.$dato->id)}}"><button type="button" class="btn btn-warning">Editar</button></a>
                            @endcan

                            @can('consultar-Cirugia')   
                                @elseif($mascotas->fallecidoMascota == 'Fallecido')
                                <a href="{{ url('/citacirugia/consultarCitaCirugia/'.$dato->id)}}"><button type="button" class="btn btn-info">Consultar</button></a>
                                @endif
                            @endcan
                            <form id="EditForm{{$dato->id}}" action="{{url('/citacirugia/'.$dato->id)}}" method="post">
                            @csrf
                            @can('borrar-Cirugia')   
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_cirugia('{{$dato->title}}','{{$dato->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
                            @endcan

                        </form>

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
        $(document).ready(function() {
            $('#mascota').DataTable({
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
                    'search': 'Buscar',
                    'paginate': {
                        'first': 'Primero',
                        'last': 'Ultimo',
                        'next': 'Siguiente',
                        'previous': 'Anterior',
                    },

                },
            });
        });
    </script>
@endsection
