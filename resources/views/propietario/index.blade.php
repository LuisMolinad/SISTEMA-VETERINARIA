@extends('app')

@section('titulo')
GESTIONAR PROPIETARIO
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="code.jquery.com/jquery-3.5.1.js"></script>
<script src="cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

@section('header')
<h1 class="header">GESTIONAR PROPIETARIO</h1>
@endsection

@section('content')
    <div class="container">
        <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">Dueño</th>
                <th scope="col">Número</th>
                <th scope="col">Dirección</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propietarios as $propietario)
                <tr>
                    <td>{{$propietario->nombrePropietario}}</td>
                    <td>{{$propietario->telefonoPropietario}}</td>
                    <td>{{$propietario->direccionPropietario}}</td>
                    <td>
                        <a href="{{ url('/propietario/'.$propietario->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                    </td>
                    <td>
                        <form action="{{url('/propietario/'.$propietario->id)}}" method="post">
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

<script type="text/script">
    $(document).ready(function () {
    $('#table').DataTable();
});
</script>