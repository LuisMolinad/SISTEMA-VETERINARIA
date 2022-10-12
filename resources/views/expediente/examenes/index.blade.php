@extends('app')

@section('titulo')
EXAMENES - {{'NOMBRE'}}
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="{{asset('css/drop-area.css')}}">

@endsection

@section('header')
<h1 class="header">Examenes clinicos - {{'Nombre'}}</h1>
@endsection

@section('content')
<div class="table-responsive-sm container-fluid contenedor">
    <div class="banner-examenes">
        <form enctype="multipart/form-data" class="needs-validation" novalidate>
            <fieldset class="fieldset">
                <legend class="legend">Subir archivo</legend>
                <div class="form-group">
                    <label for="concepto">Concepto</label>
                    <select class="form-control" id="concepto" name="concepto" required>
                        <option selected>Examenes clinicos</option>
                        <option>Hemograma</option>
                    </select>
                </div>

                <div class="drag-and-drop">
                    <div class="drop-area centrador">
                        <h3>Arrastra y suelte sus archivos</h3>
                        <span>o</span>
                        <div class="btn btn-secondary">Selecciona tus archivos</div>
                        <input type="file" name="documentos" id="input-file" hidden>
                    </div>
                    <div id="preview"></div>
                </div>

                <button type="submit" class="btn btn-success mb-2">Agregar documento</button>
            </fieldset>
        </form>

    </div>

    <table class="table table-striped" style="width:100%" id="examenes">
        <thead class="table-dark table-header">
            <tr>
            <th scope="col">N°</th>
            <th scope="col">Dueño</th>
            <th scope="col">Número</th>
            <th scope="col">Dirección</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach () --}}
            <tr>
                <td>{{'Ejemplo'}}</td>
                <td>{{'Ejemplo'}}</td>
                <td>{{'Ejemplo'}}</td>
                <td>{{'Ejemplo'}}</td>
                <td id = "botones-linea">
                    <a href="#"><button type="button" class="btn btn-info">Consultar</button></a>   
                    
                    <a href="#"><button type="button" class="btn btn-warning">Editar</button></a>

                    <form action="#" method="post">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                    <a href="#"><button type="button" class="btn btn-success">Crear mascota</button></a>

                </td>
            </tr>
            {{-- @endforeach --}}
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
            $('#examenes').DataTable({
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

    <script src="{{ asset('js/drop-area.js') }}"></script>
@endsection