@extends('app')

@section('titulo')
GESTIONAR VACUNAS
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
<h1 class="header">GESTIONAR VACUNAS</h1>
@endsection

@section('content')
    <div class="container-fluid contenedor">
        <div class="boton crear container_btn">
        <a href="/vacuna/create"><button type="button" class="btn btn-success boton_crear">Crear vacuna</button></a>
        </div>
        <table class="table table-striped" style="width:100%" id="vacuna">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">Número</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Tiempo entre dosis</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacunas as $vacuna)
                <tr>
                    <td>{{$vacuna->id}}</td>
                    <td>{{$vacuna->nombreVacuna}}</td>
                    <td>{{$vacuna->descripcionVacuna}}</td>
                    <td>{{$vacuna->tiempoEntreDosisDia}}</td>
                    <td>
                        <a href="#"><button type="button" class="btn btn-warning">Editar</button></a>
                    </td>
                    <td>
                       <!-- <form action="{{url('/vacuna/'.$vacuna->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return confirm('Quieres borrar?')" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>-->
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
