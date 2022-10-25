@extends('app')

@section('titulo')
EDITAR MASCOTA
@endsection

@section('librerias')
    <!--Date picker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="{{asset('js/datepicker.js')}}" defer></script>
@endsection


@section('header')
    <h1 class="header">EDITAR MASCOTA</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/mascota/'.$mascota->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            {{method_field('PATCH')}}
            <fieldset class="fieldset">
                <legend class="legend">Mascota</legend>

                <div id="form_id_mascota" class="form-group">
                    <label for="idMascota">Código de la mascota</label>
                    <input type="text" onchange="consultar()" onmouseout="consultar()" onkeydown="consultar()" onkeyup="consultar()" value="{{$mascota->idMascota}}" class="form-control" id="idMascota" name="idMascota" pattern="[A-Z]{1}[0-9]{3}" placeholder="Ingrese el código de la mascota" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un codigo válido (Una letra y 3 digitos)
                    </div>
                    <div id="falso_valido" class="valid-feedback">
                        Formato válido
                    </div>
                    <div id="invalido" class="invalido">
                        Este codigo ya esta en uso, favor probar con otro.
                    </div>
                    <div id="llave" class="none" >{{$mascota->idMascota}}</div>
                </div>

                <div class="form-group none">
                    <label for="propietario_id">Id de el propietario</label>
                    <input value="{{$mascota->propietario_id}}" type="text" class="form-control" id="propietario_id" name="propietario_id" readonly required>
                </div>

                <div class="form-group">
                    <label for="nombreMascota">Nombre de la mascota</label>
                    <input value="{{$mascota->nombreMascota}}" type="text" maxlength="15" class="form-control" id="nombreMascota" name="nombreMascota" placeholder="Ingrese el nombre de la mascota" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un nombre válido
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                </div>
                <div class="form-group">
                    <label for="razaMascota">Raza</label>
                    <input value="{{$mascota->razaMascota}}" type="text" class="form-control" id="razaMascota" name="razaMascota" placeholder="Ingrese la raza de la mascota" required>
                    <div class="invalid-feedback">
                        Por favor ingrese una raza válida
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                </div>
                <div class="form-group">
                    <label for="especie">Especie</label>
                    <div class="especie-c">
                    <select class="form-control" id="especie_id" name="especie_id">
                        <!--Para listar cada especie de la tabla especies-->
                        @foreach ($especies as $especie)
                            <!--Asignando valor de la especie de la mascota ya asignada-->
                            <option value="{{$mascota->especie->id}}" hidden>{{$mascota->especie->nombreEspecie}}</option>
                            <option value="{{$especie->id}}">{{$especie->nombreEspecie}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una especie válida
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                </div>
                <div class="form-group">
                    <label for="colorMascota">Color</label>
                    <input value="{{$mascota->colorMascota}}" type="text" class="form-control" id="colorMascota" name="colorMascota" placeholder="Ingrese el color de la mascota" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un color válido
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                </div>
                <div class="form-group">
                    <label for="sexoMascota">Sexo</label>
                    <select class="form-control" id="sexoMascota" name="sexoMascota">
                        <option <?php if( $mascota->sexoMascota == 'Hembra' ) { echo 'selected'; } ?> >Hembra</option>
                        <option <?php if( $mascota->sexoMascota == 'Macho' ) { echo 'selected'; } ?> >Macho</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                    <input id="fecha__Nacimiento" name="fechaNacimiento" class="date form-control" type="text" readonly="readonly" value="{{$mascota->fechaNacimiento}}" required>
                    <div class="invalid-feedback fecha__invalida">
                        Por favor ingrese una fecha válida
                    </div>
                    <div class="valid-feedback fecha__valida">
                        Dato válido
                    </div>
                </div>
                <div class="form-group">
                    <label for="fallecidoMascota">Estado de la mascota</label>
                    <select class="form-control" id="fallecidoMascota" name="fallecidoMascota">
                        <option <?php if( $mascota->fallecidoMascota == 'Fallecido' ) { echo 'selected'; } ?>  >Fallecido</option>
                        <option <?php if( $mascota->fallecidoMascota == 'Vivo' ) { echo 'selected'; } ?>  >Vivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="caracteristicasEspeciales">Caracteristicas especiales</label>
                    <textarea class="form-control" id="caracteristicasEspeciales" name="caracteristicasEspeciales" rows="3" maxlength="100">{{$mascota->caracteristicasEspeciales}}</textarea>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Editar</button>
        </form>
    </div>

@endsection

@section('js')
<script>

var roa;

var falso = document.querySelector('#falso_valido');
var elemento = document.querySelector('#invalido');
var pet_code = $('#idMascota');
var contenedor = document.querySelector('#form_id_mascota');
elemento.classList.add('none');
var llave = document.querySelector('#llave');

consultar();
/* setInterval(()=>{
    consultar();
},1000); */

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');
    var fecha = $('#fecha__Nacimiento');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity() || consultar() != true || fecha[0].value == '' ) {

                    event.preventDefault();
                    event.stopPropagation();
                    consultar();

                }

                validad___fecha();
                consultar();

                form.classList.add('was-validated')
                
            }, false)
        })
})()

function validad___fecha(){

    var fecha__v = $('#fecha__Nacimiento');
    var valida = $('.fecha__valida');
    var invalida = $('.fecha__invalida');

    if(fecha__v[0].value == ''){
        valida.fadeOut(0);
        invalida.fadeIn(0);
    }
    else if(fecha__v[0].value != ''){
        invalida.fadeOut(0);
        valida.fadeIn(0);
    }
}

function consultar(){

    if(pet_code[0].value!=''){
        consultar_json(pet_code[0].value);
        var retorno = true;

        if (roa == undefined){
            elemento.classList.add('none');
            falso.classList.remove('none');
            retorno = false;
        }
        else if(roa == 0){
            elemento.classList.add('none');
            falso.classList.remove('none');
            falso.removeAttribute('style');

            retorno = true;
        }
        else if( (roa > 0 && llave.innerHTML != pet_code[0].value) ){                

            elemento.classList.remove('none');
            falso.classList.add('none');
            falso.setAttribute('style','display: none');

            retorno = false;
        }
    }

    return retorno;
}

function consultar_json(variable){

    var bandera;

    fetch('/mascota/consultar/'+variable)
        .then(response=>{
            return response.json();
        }
    )
    .then(jsondata => asignar(jsondata));

}

function asignar(x){
    roa = x;
}

</script>

{{-- <script src="{{asset('js/otro.js')}}"></script> --}}
@endsection