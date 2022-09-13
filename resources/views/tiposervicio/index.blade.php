@extends('app')

@section('titulo')
GESTIONAR TIPO DE SERVICIO
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
<h1 class="header">GESTIONAR TIPO DE SERVICIO</h1>
@endsection

@section('content')
    @include('layouts.notificacion')
    <div class="table-responsive-sm container-fluid contenedor" style="margin-bottom: 30px">
        <div class="boton crear container_btn_hend">
            <a href="/tiposervicio/create"><button type="button" class="btn btn-success boton_crear">Crear tipo de servicio</button></a>
        </div>
        <table class="table table-striped" style="width:100%" id="tiposervicio">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposervicios as $tiposervicio)
                {{-- Codigo para identificar los tipos de servicios no disponibles --}}
                <tr
                    <?php
                            if($tiposervicio->disponibilidadServicio == False){
                                echo 'style="background-color:rgba(218,190,133,1); color:black;"';
                            }
                    ?>
                >
                    <td>{{$tiposervicio->id}}</td>
                    <td>{{$tiposervicio->nombreServicio}}</td>
                    <td>{{$tiposervicio->descripcionServicio}}</td>
                    <td id = "botones-linea">
                        <a href="{{ route('tiposervicio.show',$tiposervicio->id) }}"><button type="button" class="btn btn-info">Consultar</button></a>
                        <a href="{{ url('/tiposervicio/'.$tiposervicio->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                        @if($tiposervicio->disponibilidadServicio == True)
                            <form id="DeshabilitarForm{{$tiposervicio->id}}" action="{{route('Tiposervicio.update',[$tiposervicio->id,'accion'=>"deshabilitar"])}}" method="post">                            
                                @csrf
                                {{method_field('PATCH')}}
                                <input id="disponibilidadServicio" name="disponibilidadServicio" type="hidden" value="0">
                                <button onclick="return alerta_deshabilitar_tiposervicio('{{$tiposervicio->nombreServicio}}','{{$tiposervicio->id}}');" type="submit" class="btn btn-secondary">Deshabilitar</button>
                            </form>
                        @else
                            <form id="HabilitarForm{{$tiposervicio->id}}" action="{{route('Tiposervicio.update',[$tiposervicio->id,'accion'=>"habilitar"])}}" method="post">
                                @csrf
                                {{method_field('PATCH')}}
                                <input id="disponibilidadServicio" name="disponibilidadServicio" type="hidden" value="1">
                                <button onclick="return alerta_habilitar_tiposervicio('{{$tiposervicio->nombreServicio}}','{{$tiposervicio->id}}');" type="submit" class="btn btn-secondary" style="width:110px">Habilitar</button>
                            </form>
                        @endif 
                        <form id="BorrarForm{{$tiposervicio->id}}" action="{{url('/tiposervicio/'.$tiposervicio->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_tiposervicio('{{$tiposervicio->nombreServicio}}','{{$tiposervicio->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Botón para abrir y cerrar ayuda -->
    <a href="javascript:ayuda()" class="boton_ayuda" id="boton_ayuda"></a>
    <!-- Contenedor de ayuda -->
    <div class="ventana_ayuda" id="ventana_ayuda">
        <strong>Ayuda</strong>
        <br>
        <br>
        Gestiona los tipos de servicios que se ofrecen en citas de servicios.
        <br>
        <br>
        Usa los botones "Habilitar" o "Deshabilitar" para gestionar la disponibilidad de los servicios que se ofrecen en las citas de servicios.
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tiposervicio').DataTable({
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
    <!-- Función para abrir y cerrar la ayuda -->
    <script>
        function ayuda(){
            const element=document.getElementById("ventana_ayuda");
            const display = window.getComputedStyle(element).display;
            if(display == "none"){
                document.getElementById("ventana_ayuda").style.display="block";
                document.getElementById("boton_ayuda").style.backgroundColor="#037b0d";
            }
            else{
                document.getElementById("ventana_ayuda").style.display="none";
                document.getElementById("boton_ayuda").style.backgroundColor="#00a00d";
            }
        }
    </script>
@endsection
