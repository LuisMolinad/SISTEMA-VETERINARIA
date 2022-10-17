@extends('app')

@section('titulo')
EXAMENES - {{$datos['mascota']->nombreMascota}}
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="{{asset('css/drop-area.css')}}">

<!-- Llamamos al sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Llamamos nuestro documento de sweetalert -->
<script src="{{asset('js/eliminar_sweetalert2.js')}}"></script>

@endsection

@section('header')
<h1 class="header">Examenes clinicos - {{$datos['mascota']->nombreMascota}}</h1>
@endsection

@section('content')
<div class="table-responsive-sm container-fluid contenedor">
    <div class="banner-examenes">
        <form enctype="multipart/form-data" action="{{url('/examen')}}" method="POST" class="needs-validation" novalidate>
            @csrf
            <fieldset class="fieldset">
                <legend class="legend">Subir archivo</legend>
                <div class="form-group">
                    <label for="concepto">Concepto</label>
                    <select class="form-control" id="concepto" name="concepto" required>
                        <option selected>Examenes clinicos</option>
                        <option>Hemograma</option>
                    </select>

                    <div class="invalid-feedback">
                        Por favor ingrese un dato válido
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>

                </div>

                <div class="drag-and-drop">
                    <div class="drop-area centrador">
                        <h3>Arrastra y suelte sus archivos</h3>
                        <span>o</span>
                        <div class="btn btn-secondary">Selecciona tus archivos</div>
                        <div class="form-group">
                            <input type="file" name="documento" id="input-file" class="form-control" required hidden>
                            <div class="invalid-feedback">
                                Por favor ingrese un documento válido
                            </div>
                            <div class="valid-feedback">
                                Documento válido
                            </div>
                        </div>
                    </div>
                    <div id="preview"></div>
                </div>

                <div id="expediente-id">
                    <input type="text" name="expediente_id" value="{{$datos['expediente']->id}}" hidden>
                </div>

                <button type="submit" class="btn btn-success mb-2">Agregar documento</button>
            </fieldset>
        </form>

    </div>

    <table class="table table-striped" style="width:100%" id="examenes">
        <thead class="table-dark table-header">
            <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Concepto</th>
            <th scope="col">Nombre</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos['examenes'] as $examen)
            <tr>
                <td>{{ date( "d-m-Y", strtotime($examen->fecha) ) }}</td>
                <td>{{$examen->concepto}}</td>
                <td>{{substr($examen->documento, 17)}}</td>
                <td id = "botones-linea">
                    <a href=" {{asset('storage'.'/'.$examen->documento)}} " target="_blank"><button type="button" class="btn btn-info">Consultar</button></a>

                    <form action="{{url('/examen/'.$examen->id)}}" method="post" id="EditForm{{$examen->id}}">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" onclick="return alerta_eliminar_examen('{{$examen->id}}')">Eliminar</button>
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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection