@extends('app')

@section('titulo')
GESTIONAR RECORDATORIOS
@endsection

@section('header')
<h1 class="header">GESTIONAR RECORDATORIOS</h1>
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<script src=" {{asset('js/recordatorio_enviar_mensajes.js')}} "></script>
<link rel="stylesheet" href="{{asset('css/recordatorio.css')}}">

<!-- Llamamos al sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Llamamos nuestro documento de sweetalert -->
<script src="{{asset('js/eliminar_sweetalert2.js')}}"></script>
@endsection

@section('content')

@include('layouts.notificacion')

<div class="table-responsive-sm container-fluid contenedor">
    
    <div class="banner_recordatorio">
        <div class="banner_01">
            <p><span class="mensaje_enviado_c"></span>Mensajes enviados</p>
            <p><span class="mensaje_no_enviado_c"></span>Mensajes no enviados</p>
            <p><span class="mensaje_proximo_a_enviar_c"></span>Mensajes proximos a enviar</p>
        </div>

        <div class="banner_02">
            <div>
                <div class="filtros_contenedor">
                    <label for="estado_mensaje">Estado de mensaje</label>
                    <select name="estado_mensaje" id="selector_estado_mensaje">
                        <option value="">Todos</option>
                        <option value="0">Mensajes proximos a enviar</option>
                        <option value="2">No enviados</option>
                        <option value="1">Enviados</option>
                    </select>
                </div>
                <br>
                <div class="filtros_contenedor">
                    <label for="filtro_por_dia">Filtrar por dia de envio: </label>
                    <input type="date" name="filtro_por_dia" id="filtro_por_dia">
                </div>
{{--                 <br>
                <button type="button" id="btn_limpiar" class="btn btn-secondary">Limpiar filtros</button> --}}
            </div>
        </div>

        <div class="banner_03">
            @can('enviar-Recordatorio')
            <div class="boton crear container_btn_hend">
                <a href="/recordatorio/enviar_ui"><button type="button" class="btn btn-success boton_crear">Crear mensaje de recordatorio</button></a>
            </div>
            @endcan
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped" style="width:100%" id="recordatorio">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">Id mascota</th>
                <th scope="col">Nombre</th>
                <th scope="col">Concepto</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha y hora de la cita</th>
                <th scope="col">Fecha a enviar el recordatorio</th>
                <th scope="col"></th>
                <th class="none" scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recordatorios as $recordatorio)
                    @if ($recordatorio->dias_de_anticipacion != 0)
                        <tr
                        <?php
                            if($recordatorio->estado == 1){
                                echo ' style="background-color: lightgreen;"';
                                
                            }
                            else if($recordatorio->estado == -1){
                                echo ' style="background-color: lightcoral;"';
                            }
                        ?>
                        >
                            <td> {{$recordatorio->id_mascota}} </td>
                            <td> {{$recordatorio->nombre}} </td>
                            <td> {{$recordatorio->concepto}} </td>
                            <td> {{$recordatorio->telefono}} </td>
                            <td>
                                <?php
                                    echo date("d-m-Y --- H:i", strtotime($recordatorio->fecha));
                                ?>
                            </td>
                            <td> 
                                <?php 
                                    echo date("d-m-Y", strtotime($recordatorio->fecha . " - " . $recordatorio->dias_de_anticipacion . " days"));
                                ?> 
                            </td>
            
                                @if ($recordatorio->estado == 0)
                                    <td class = "botones-linea-xl">
                                        <a href="{{ url('/recordatorio/'.$recordatorio->id) }}"><button type="button" class="btn btn-primary">Consultar</button></a>
                                        
                                        @can('editar-Recordatorio')
                                        <a href="{{ url('/recordatorio/'.$recordatorio->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                                        @endcan
    
                                        @can('borrar-Recordatorio')
                                        <form id="EditForm{{$recordatorio->id}}" action="{{url('/recordatorio/'.$recordatorio->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button onclick="return alerta_eliminar_recordatorio('{{$recordatorio->id}}');" class="btn btn-danger">Eliminar</button>
                                        </form>
                                        @endcan
    
                                        <button type="button" class="btn btn-info oculto">Reenviar</button>
                                @elseif($recordatorio->estado == 1)
                                    <td id = "botones-linea">
                                        <a href="{{ url('/recordatorio/'.$recordatorio->id) }}"><button type="button" class="btn btn-primary">Consultar</button></a>
                                        
                                        @can('editar-Recordatorio')
                                        <button type="button" class="btn btn-warning oculto">Editar</button>
                                        @endcan
    
                                        @can('borrar-Recordatorio')
                                        <form class="candidatos_a_eliminar" action="{{url('/recordatorio/'.$recordatorio->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger oculto">Eliminar</button>
                                        </form>
                                        @endcan
    
                                        <button type="button" class="btn btn-info oculto">Reenviar</button>
                                @elseif ($recordatorio->estado == -1)
                                    <td id = "botones-linea">
                                        <a href="{{ url('/recordatorio/'.$recordatorio->id) }}"><button type="button" class="btn btn-primary">Consultar</button></a>
                                        
                                        @can('editar-Recordatorio')
                                        <a href="{{ url('/recordatorio/'.$recordatorio->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                                        @endcan
    
                                        @can('borrar-Recordatorio')
                                        <form id="EditForm{{$recordatorio->id}}" action="{{url('/recordatorio/'.$recordatorio->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button onclick="return alerta_eliminar_recordatorio('{{$recordatorio->id}}');" class="btn btn-danger">Eliminar</button>
                                        </form>
                                        @endcan
    
                                        <a href="{{url('/recordatorio/reenviar/'.$recordatorio->id)}}"><button type="button" class="btn btn-info">Reenviar</button></a>
                                @endif
                            </td>
                            <td id="estado_funcion_filtrar" class="none">
                                @if ($recordatorio->estado == -1)
                                    2
                                @else
                                {{$recordatorio->estado}}
                                @endif
                            </td>
                        </tr>
                        <p class="none dato_id"> {{$recordatorio->id}} </p>
                        <p class="none dato_estado"> {{$recordatorio->estado}} </p>
                        <p class="none dato_id_mascota"> {{$recordatorio->id_mascota}} </p>
                        <p class="none dato_nombre"> {{$recordatorio->nombre}} </p>
                        <p class="none dato_concepto" > {{$recordatorio->concepto}} </p>
                        <p class="none dato_telefono" > {{$recordatorio->telefono}} </p>
                        <p class="none dato_fecha" >
                            <?php
                                echo date("d-m-Y --- H:i", strtotime($recordatorio->fecha));
                            ?>
                        </p>
                        <p class="none dato_fecha_enviar" > 
                            <?php 
                                echo date("d-m-Y", strtotime($recordatorio->fecha . " - " . $recordatorio->dias_de_anticipacion . " days"));
                            ?> 
                        </p>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="boton crear container_btn_hstart">
        
        @can('enviar-Recordatorio')
        <button type="button" onclick="enviar_mensajes()" class="btn btn-success boton_opcional">Enviar mensajes</button>
        @endcan
        
        @can('borrar-Recordatorio')
        <button type="button" onclick="eliminar_mensajes()" class="btn btn-danger boton_opcional">Eliminar mensajes enviados</button>
        @endcan

    </div>
</div>

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            var table_recordatorio = $('#recordatorio').DataTable({
                "lengthMenu":[[5,10,25,-1],[5,10,25,"Todos"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ records por página",
                    "zeroRecords": "No hay registros en la base de datos",
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
                "order":[5, "desc"]
            });

            const selector = document.querySelector('#selector_estado_mensaje');
            selector.addEventListener('change', ()=>{
                table_recordatorio
                    .columns( 7 )
                    .search( selector.value )
                    .draw();
            });

            const filtro_fecha = document.querySelector('#filtro_por_dia');
            filtro_fecha.addEventListener('change', ()=>{
                table_recordatorio
                    .columns( 5 )
                    .search( formatear_fecha(filtro_fecha.value) )
                    .draw();

                    console.log( formatear_fecha(filtro_fecha.value))
                    console.log(filtro_fecha.value);
            });
        });

        function formatear_fecha(fecha){
            var dia = '', mes = '', anio= '';
            var nueva_fecha = [];
            var i = 0;


            if(fecha == ''){
                return '';
            }

            try{
                for(var i = 0 ; i < fecha.length ; i++){
                    if(i<4){
                        anio += fecha[i];
                    }
                    else if(i>4 && i<7){
                        mes += fecha[i];
                    }
                    else if(i>7){
                        dia += fecha[i];
                    }
                }
                nueva_fecha = dia + '-' + mes + '-' + anio;
            }
            catch(exception){
                nueva_fecha = fecha;
                console.log(exception)
            }

            return nueva_fecha; 
        }
    </script>
@endsection