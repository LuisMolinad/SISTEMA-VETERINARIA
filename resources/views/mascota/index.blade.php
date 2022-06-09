@extends('app')

@section('titulo')
GESTIONAR MASCOTA
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@section('header')
<h1 class="header">GESTIONAR MASCOTA</h1>
@endsection

@section('content')
    <div class="container-fluid contenedor">
        <div class="boton crear container_btn">
        <a href="/mascota/create"><button type="button" class="btn btn-success boton_crear">Crear mascota</button></a>
        </div>
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
                    <td>
                        <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                    </td>
                    <td>
                        <form action="{{url('/mascota/'.$mascota->id)}}" method="post">
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
            $('#mascota').DataTable({
                "lengthMenu":[[5,10,25,-1],[5,10,25,"Todos"]]
            });
        });
    </script>
@endsection
