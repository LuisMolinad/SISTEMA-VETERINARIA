@extends('app')

@section('titulo')
GESTIONAR CIRUGIA
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
<h1 class="header">GESTIONAR CIRUGIA</h1>
@endsection

@section('content')

    @include('notificacion')

    <div class="table-responsive-sm container-fluid contenedor">
        <table class="table table-striped"  id="mascota">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">Concepto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Recomendacion Pre-operatoria</th>
                <th scope="col">Codigo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                <tr>
                    <td>{{$dato->conceptoCirugia}}</td>
                    <td>{{$dato->start}}</td>
                    <td>{{$dato->recomendacionPreoOperatoria}}</td>
                    <td id = "botones-linea">
                        {{$dato->mascota_id}}
{{--                         <a href="{{ url('/mascota/'.$mascota) }}"><button type="button" class="btn btn-primary">Consultar</button></a>
                      <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                        <form id="EditForm{{$mascota->id}}" action="{{url('/mascota/'.$mascota->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_general('{{$mascota->nombreMascota}}','{{$mascota->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
                        </form> --}}
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
