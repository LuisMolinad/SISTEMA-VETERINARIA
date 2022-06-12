@extends('app')

@section('titulo')
GESTIONAR EXPEDIENTE
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
<h1 class="header">GESTIONAR EXPEDIENTE</h1>
@endsection

@section('content')
    <div class="table-responsive-sm container-fluid contenedor">
        <table class="table table-striped" style="width:100%" id="expediente">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">ID Mascota</th>
                <th scope="col">Nombre Mascota</th>
                <th scope="col">Dueño</th>
                <th scope="col">Fallecido expediente</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expedientes as $expediente)
                <tr>
                    <td
                    <?php
                        if($expediente->fallecidoExpediente == "Fallecido"){
                            echo 'class = "fallecido"';
                        }
                    ?>
                    >{{$expediente->id}}</td>
                    <td
                    <?php
                        if($expediente->fallecidoExpediente == "Fallecido"){
                            echo 'class = "fallecido"';
                        }
                    ?>
                    >{{$expediente->mascota->idMascota}}</td>
                    <td
                    <?php
                        if($expediente->fallecidoExpediente == "Fallecido"){
                            echo 'class = "fallecido"';
                        }
                    ?>
                    >{{$expediente->mascota->nombreMascota}}</td>
                    <td

                    <?php
                        if($expediente->fallecidoExpediente == "Fallecido"){
                            echo 'class = "fallecido"';
                        }
                    ?>

                    >{{$expediente->mascota->propietario->nombrePropietario}}</td>
                    <td

                    <?php
                        if($expediente->fallecidoExpediente == "Fallecido"){
                            echo 'class = "fallecido"';
                        }
                    ?>

                    class="estado">{{$expediente->fallecidoExpediente}}</td>
                    <td

                    <?php
                        if($expediente->fallecidoExpediente == "Fallecido"){
                            echo 'class = "fallecido"';
                        }
                    ?>
                    id = "botones-linea"

                    >
                       <!-- <a href="{{ url('/expediente/'.$expediente->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>

                        <form action="{{url('/expediente/'.$expediente->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return confirm('Quieres borrar?')" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>-->


                        <a href="/exped/{{$expediente->id}}" class="btn btn-success">{{__('Reporte')}}</a>

                        <!--
                        <form action="{{url('/expediente/pdf/'.$expediente->id)}}" method="get">
                        <button type="submit" class="btn btn-success">Reporte</button>
                        </form>
                    -->
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
