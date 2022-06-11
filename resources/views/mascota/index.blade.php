@extends('app')

@section('titulo')
GESTIONAR MASCOTA
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
<h1 class="header">GESTIONAR MASCOTA</h1>
@endsection

@section('content')
    <div class="container-fluid contenedor">
        <table class="table table-striped" style="width:100%" id="mascota">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Codigo</th>
                <th scope="col">Id propietario</th>
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
                    <td>{{$mascota->propietario_id}}</td>
                    <td>{{$mascota->nombreMascota}}</td>
                    <td>{{$mascota->razaMascota}}</td>
                    <td>{{$mascota->especie}}</td>
                    <td>{{$mascota->colorMascota}}</td>
                    <td id = "botones-linea">
                        <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                        <form action="{{url('/mascota/'.$mascota->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return confirm('Quieres borrar?')" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="/expediente/create/{{$mascota->id}}"><button type="button" class="btn btn-success">Crear expediente</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
