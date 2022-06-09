@extends('app')

@section('titulo')
GESTIONAR EXPEDIENTE
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@section('header')
<h1 class="header">GESTIONAR EXPEDIENTE</h1>
@endsection

@section('content')
    <div class="container-fluid contenedor">
        <div class="boton crear container_btn">
        <a href="/expediente/create"><button type="button" class="btn btn-success boton_crear">Crear expediente</button></a>
        </div>
        <table class="table table-striped" style="width:100%" id="expediente">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">ID Mascota</th>
                <th scope="col">Causa Fallecimiento</th>
                <th scope="col">Fallecido expediente</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expedientes as $expediente)
                <tr>
                    <td>{{$expediente->id}}</td>
                    <td>{{$expediente->mascota_id}}</td>
                    <td>{{$expediente->causaFallecimiento}}</td>
                    <td>{{$expediente->fallecidoExpediente}}</td>
                    <td>
                        <a href="{{ url('/expediente/'.$expediente->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                    </td>
                    <td>
                        <form action="{{url('/expediente/'.$expediente->id)}}" method="post">
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
            $('#expediente').DataTable({
                "lengthMenu":[[5,10,25,-1],[5,10,25,"Todos"]]
            });
        });
    </script>
@endsection