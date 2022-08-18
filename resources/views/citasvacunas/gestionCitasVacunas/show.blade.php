@extends('app')

@section('titulo')
    Gestionar citas de Vacunación
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- Llamamos al sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Llamamos nuestro documento de sweetalert -->
    <script src="{{ asset('js/eliminar_sweetalert2.js') }}"></script>
@endsection

@section('header')
    <h2 class="header">Gestionar citas de Vacunación de {{ $mascotas->nombreMascota }} ID: {{ $mascotas->idMascota }}</h2>
@endsection

@section('content')
    <div class="table-responsive-sm container-fluid contenedor">

        <table class="table table-striped" id="citaVacuna">
            <thead class="table-dark table-header">
                <tr>
                    {{-- <th scope="col" style="display:none;">id</th> --}}
                    <th scope="col" style="display:none;">id</th>
                    <th scope="col">Vacuna</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Fecha Aplicación</th>
                    <th scope="col">Fecha Refuerzo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <!-- $mascota->propietario(es el nombre del metodo que esta en el model que define la relacion)->nombrePropietario(el nombre de la columna en la bd)-->
            <tbody>
                @foreach ($mascotas->citas as $registro)
                    <tr>
                        {{-- <th scope="id" style="display:none;">{{ $registro->pivot->id }} --}}
                        <th scope="id" style="display:none;">{{ $registro->pivot->id }}</th>
                        <th scope="id">{{ $registro->nombreVacuna }}</th>
                        <th scope="id">{{ $registro->pivot->pesolb }}</th>
                        <th scope="id">{{ $registro->pivot->fechaAplicacion }}</th>
                        <th scope="id">{{ $registro->pivot->start }}</th>
                        <td id="botones-linea">

                            <a type="button" class="btn btn-info"
                                href="{{ route('gestionVacuna.index', [$mascotas->id, 'citaVacuna_id' => $registro->pivot->id]) }}">
                                Consultar</a>
                            @if ($mascotas->fallecidoMascota == 'Vivo')
                                <a type="button" class="btn btn-warning"
                                    href="{{ route('gestionVacuna.edit', [$mascotas->id, 'citaVacuna_id' => $registro->pivot->id]) }}">
                                    Editar</a>
                            @endif
                            {{-- <a type="button" class="btn btn-danger"
                                href="{{ route('gestionVacuna.delete', ['citaVacuna_id' => $registro->pivot->id]) }}"
                                onclick="return alerta_eliminar_citaVacuna('{{ $registro->nombreVacuna }}','{{ $mascotas->nombreMascota }}');">
                                Eliminar</a> --}}
                            <form id="EditForm{{ $registro->pivot->id }}"
                                action="{{ route('gestionVacuna.delete', ['citaVacuna_id' => $registro->pivot->id]) }}">

                                {{ method_field('DELETE') }}
                                <button
                                    onclick="return alerta_eliminar_citaVacuna('{{ $registro->nombreVacuna }}','{{ $registro->pivot->id }}')"
                                    type="submit" class="btn btn-danger">Eliminar</button>
                            </form>

                            {{-- <form id="EditForm{{$mascota->id}}" action="{{url('/mascota/'.$mascota->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_general('{{$mascota->nombreMascota}}','{{$mascota->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
                        </form> --}}
                            {{-- <button type="button" class="btn btn-danger">Eliminar</button> --}}

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
        $(document).ready(function() {
            $('#citaVacuna').DataTable({
                "lengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "Todos"]
                ],

                "language": {
                    "lengthMenu": "Mostrar _MENU_ records por página",
                    "zeroRecords": "No se encuentran datos relacionados found - ",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar',
                    'paginate': {
                        'first': 'Primero',
                        'last': 'Ultimo',
                        'next': 'Siguiente',
                        'previous': 'Anterior',
                    },

                },
            });


        });
    </script>
@endsection
