@extends('app')

@section('titulo')
    GESTIONAR CITA VACUNA
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <h1 class="header">Gestionar citas de Vacunación</h1>
@endsection

@section('content')
    <div class="container-fluid contenedor">

        <table class="table table-striped" style="width:100%" id="citaVacuna">
            <thead class="table-dark table-header">
                <tr>
                    <th scope="col">ID Mascota</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dueño</th>
                    <th scope="col">Número</th>
                    <th scope="col">Dirección</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <!-- $mascota->propietario(es el nombre del metodo que esta en el model que define la relacion)->nombrePropietario(el nombre de la columna en la bd)-->
            <tbody>
                @foreach ($mascotas as $mascota)
                    <tr>
                        <th scope="id">{{ $mascota->idMascota }}</th>
                        <td id="nombre mascota">{{ $mascota->nombreMascota }}</td>
                        <td id="nombre duenio">{{ $mascota->propietario->nombrePropietario }}</td>
                        <td id="telefono duenio">{{ $mascota->propietario->telefonoPropietario }}</td>
                        <td id="direccion  duenio">{{ $mascota->propietario->direccionPropietario }}</td>
                        <td>
                            <a role="button" class="btn btn-success" href="{{ url('/crearCitaVacuna/'.$mascota->id) }}">Crear</a>
                           <!--
                            <button type="button" class="btn btn-warning">Editar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>-->
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
