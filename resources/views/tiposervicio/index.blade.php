@extends('app')

@section('titulo')
GESTIONAR TIPO DE SERVICIO
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
<h1 class="header">GESTIONAR TIPO DE SERVICIO</h1>
@endsection

@section('content')
    <div class="container-fluid contenedor">
        <div class="boton crear container_btn">
            <a href="/tiposervicio/create"><button type="button" class="btn btn-success boton_crear">Crear tipo de servicio</button></a>
        </div>
        <table class="table table-striped" style="width:100%" id="tiposervicio">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposervicios as $tiposervicio)
                <tr>
                    <td>{{$tiposervicio->id}}</td>
                    <td>{{$tiposervicio->nombreServicio}}</td>
                    <td>{{$tiposervicio->descripcionServicio}}</td>
                    <td>
                        <a href="{{ route('tiposervicio.show',$tiposervicio->id) }}"><button type="button" class="btn btn-info">Consultar</button></a>   
                    </td>
                    <td>
                       <a href="{{ url('/tiposervicio/'.$tiposervicio->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                    </td>
                    <td>
                        <form action="{{url('/tiposervicio/'.$tiposervicio->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return confirm('Quieres borrar?')" type="submit" class="btn btn-danger">Eliminar</button>
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
@endsection
