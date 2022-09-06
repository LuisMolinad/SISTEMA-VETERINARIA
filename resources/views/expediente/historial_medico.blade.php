@extends('app')

@section('titulo')
Historial Medico
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
    <h1 class="header">Historial de la Mascota {{$expediente->mascota->nombreMascota}} - ID Mascota: {{$expediente->mascota->idMascota}}</h1>
@endsection

@section('content')
    <div class="table-responsive-sm container-fluid contenedor">

        <form id="agregar_linea" action="">
            <input type="text" id="expediente_id" name="expediente_id" value="{{$expediente->id}}" class="none">
            <label for="">Diagnostico:</label>
            <input id="textoLineaHistorial" type="text" name="textoLineaHistorial">
            <button onclick="return agregar_linea()" class="btn btn-success mb-2">Agregar linea</button>
        </form>

        <table class="table table-striped" id="tarjetahistorial">
            <thead class="table-dark table-header">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Diagnostico</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <!--Obtengo el valor de la linea de historial de la base de datos-->
            @foreach ($expediente->HistorialMedico as $lineaHistorial)
                <tr>
                    <td>{{$lineaHistorial->fechaLineaHistorial}}</td>
                    <td class="linea" id_linea ="{{$lineaHistorial->id}}">{{$lineaHistorial->textoLineaHistorial}}</td>
                    <td>
                        <form id="EditForm{{$lineaHistorial->id}}"
                            action="{{ route('historialMedico.delete', ['lineaHistorial' => $lineaHistorial->id]) }}">
        
                            {{ method_field('DELETE') }}
                            <button onclick="return alerta_eliminar_lineahistorial('{{ $lineaHistorial->id }}')" type="submit" class="btn btn-danger">Eliminar</button>
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
            $('#tarjetahistorial').DataTable({
                "lengthMenu":[[5,10,25,-1],[5,10,25,"Todos"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ records por página",
                    "zeroRecords": "No se encuentran datos relacionados ",
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

    <!--Agregar-->
    <script>
        function agregar_linea(){

            var expediente_id = document.querySelector('#expediente_id').value;
            var linea = document.querySelector('#textoLineaHistorial').value;

            var dia, mes;

            var hoy = new Date();
            if(hoy.getDate() < 10){
                dia = '0' + hoy.getDate().toString();
            }
            else{
                dia = hoy.getDate().toString();
            }

            if((hoy.getMonth()+1) <10){
                mes = '0' + (hoy.getMonth() + 1).toString();
            }
            else{
                mes = (hoy.getMonth()+1).toString()
            }

            var fecha_hoy = hoy.getFullYear() + '-' + mes + '-' + dia;
            //var nueva_linea = document.createElement('tr');
            var nueva_linea = 
            '<td>' + fecha_hoy + '</td>' +
            '<td>' + linea + '</td>' +
            '<td></td>'; 


            if(expediente_id.length > 0 && linea.length > 0){
                fetch('/historial_medico/fetch/?expediente_id='+expediente_id+'&textoLineaHistorial='+linea)
                .then(()=>{
                    console.log(fecha_hoy);
                    document.getElementById("tarjetahistorial").insertRow(-1).innerHTML = nueva_linea;
                    linea = '';
                })
            }

            return false;
        }
    </script>

    <!--Modificar-->
    <script>
        var la_tabla = document.getElementById('tarjetahistorial');
        var cells = la_tabla.getElementsByClassName('linea');

        for ( var i = 0 ; i < cells.length ; i ++ ) {

            cells[i].onclick = function () {

                if(this.hasAttribute('data-clicked')){
                    return;
                }

                var id_linea = this.getAttribute('id_linea');

                this.setAttribute('id', id_linea);

                this.setAttribute('data-clicked','yes');
                this.setAttribute('data-text', this.innerHTML);

                var input  = document.createElement ( 'input' ) ;
                input.setAttribute ( 'type' , 'text' ) ;
                input.value = this.innerHTML ;
                input.style.width = this.offsetWidth - ( this.clientLeft * 2 ) + "px" ;
                input.style.height = this.offsetHeight - ( this.clientTop * 2 ) + "px" ;
                input.style.border = "0px" ;
                input.style.fontFamily = "inherit" ;
                input.style.fontSize = "inherit" ;
                input.style.textAlign = "inherit" ;
                input.style.backgroundColor = "LightGoldenRodYellow" ;
                
                input.onblur = function() {
                    var td = input.parentElement;
                    var orig_text = input.parentElement.getAttribute('data-text');
                    var current_text = this.value;

                    if(orig_text != current_text){
                        //Aqui hacemos la magia con la bd
                        //saeve to db with ajax

                        //Rosalio magia
                        fetch('/historial/edit_editable/?id=' + id_linea + '&textoLineaHistorial='+current_text)
                        .then(()=>{
                            console.log('si hace el cambio');
                        })
                        //Rosalio magia


                        td.removeAttribute('data-clicked');
                        td.removeAttribute('data-text');
                        td.innerHTML = current_text;
                        td.style.cssText = 'padding: 5px';
                        console.log(orig_text + ' is change to ' + current_text);
                    }
                    else{
                        td.removeAttribute('data-clicked');
                        td.removeAttribute('data-text');
                        td.innerHTML = orig_text;
                        td.style.cssText = 'padding: 5px';
                        console.log('no changes made');
                    }
                }
                
                this.innerHTML = '';
                this.style.cssText = 'padding: 0px 0px' ;
                this.append ( input ) ;
                this.firstElementChild.select ( ) ;
            }
        }
    </script>
@endsection

