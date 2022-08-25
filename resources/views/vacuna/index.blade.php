@extends('app')

@section('titulo')
GESTIONAR VACUNAS
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
<h1 class="header">GESTIONAR VACUNAS</h1>
@endsection

@section('content')
    @include('layouts.notificacion')
    <div class="container-fluid contenedor">   
        <div class="boton crear container_btn_hend">
            <a href="/vacuna/create"><button type="button" class="btn btn-success boton_crear">Crear vacuna</button></a>
        </div>
        <table class="table table-striped" style="width:100%" id="vacuna">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Tiempo entre dosis</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacunas as $vacuna)
                <tr
                    <?php
                        if($vacuna->disponibilidadVacuna == False){
                            echo 'class="fallecido"';
                            echo 'style="background-color:#34495E;"';
                        }
                    ?>
                >
                    <td>{{$vacuna->id}}</td>
                    <td>{{$vacuna->nombreVacuna}}</td>
                    <td>{{$vacuna->descripcionVacuna}}</td>
                    <td>{{$vacuna->tiempoEntreDosisDia}}</td>
                    <td>
                        <a href="{{ route('vacuna.show',$vacuna->id) }}"><button type="button" class="btn btn-info">Consultar</button></a>   
                    </td>
                    <td>
                        <a href="{{ url('/vacuna/'.$vacuna->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                     </td>
                    <td>
                        @if($vacuna->disponibilidadVacuna == True)
                            {{-- <form id="DeshabilitarForm{{$vacuna->id}}" action="{{url('/vacuna/'.$vacuna->id."deshabilitar")}}" method="post"> --}}
                            <form id="DeshabilitarForm{{$vacuna->id}}" action="{{route('Vacuna.update',[$vacuna->id,'accion'=>"deshabilitar"])}}" method="post">
                                    @csrf
                                {{method_field('PATCH')}}
                                <input id="disponibilidadVacuna" name="disponibilidadVacuna" type="hidden" value="0">
                                <button onclick="return alerta_deshabilitar_vacuna('{{$vacuna->nombreVacuna}}','{{$vacuna->id}}');" type="submit" class="btn btn-secondary">Deshabilitar</button>
                            </form>
                        @else
                            {{-- <form id="HabilitarForm{{$vacuna->id}}" action="{{url('/vacuna/'.$vacuna->id."habilitar")}}" method="post"> --}}
                            <form id="HabilitarForm{{$vacuna->id}}" action="{{route('Vacuna.update',[$vacuna->id,'accion'=>"habilitar"])}}" method="post">                            
                                @csrf
                                {{method_field('PATCH')}}
                                <input id="disponibilidadVacuna" name="disponibilidadVacuna" type="hidden" value="1">
                                <button onclick="return alerta_habilitar_vacuna('{{$vacuna->nombreVacuna}}','{{$vacuna->id}}');" type="submit" class="btn btn-secondary" style="width:110px">Habilitar</button>
                            </form>
                        @endif
                    </td>
                    <td> 
                        <form id="BorrarForm{{$vacuna->id}}" action="{{url('/vacuna/'.$vacuna->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_vacuna('{{$vacuna->nombreVacuna}}','{{$vacuna->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
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
            $('#vacuna').DataTable({
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
