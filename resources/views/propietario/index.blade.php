@extends('app')

@section('titulo')
GESTIONAR PROPIETARIO
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
<h1 class="header">GESTIONAR PROPIETARIO</h1>
@endsection

@section('content')
    <div class="container-fluid contenedor">
        <div class="boton crear container_btn">
        <a href="/propietario/create"><button type="button" class="btn btn-success boton_crear">Crear propietario</button></a>
        </div>
        <table class="table table-striped" style="width:100%" id="propietario">
            <thead class="table-dark table-header">
                <tr>
                <th scope="col">ID</th>
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
                    <td>{{$propietario->id}}</td>
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

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#propietario').DataTable({
                "lengthMenu":[[5,10,25,-1],[5,10,25,"Todos"]]
            });
        });
    </script>
@endsection