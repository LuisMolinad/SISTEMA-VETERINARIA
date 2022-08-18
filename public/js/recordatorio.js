/*Vista para crear recordatorio*/

function actualizar_mensaje_al_crear(){
    //* Obtenemos las variables de la pagina
    var concepto = document.querySelector('#ConceptoCirugia').value;
    var nombre = document.querySelector('#inputNombreMascota').value;
    var fecha_hora = document.querySelector('#fechaHoraCitaCirugia').value;
    var mensaje = document.querySelector('#mensaje-recordatorio');
    var dias_de_anticipacion = document.getElementById('dias_de_anticipacion');

    //* Generamos el mensaje, basandonos en la plantilla que esta registrada en META
    var contenido = '<p><strong>Veterinaria Pet Paradise le informa</strong></p><br>' + 
    '<p>Que la cita para <span>' + nombre + '</span> de <span>' + concepto + '</span> esta agendada para la fecha y hora <span>' + fecha_hora + '</span>. En caso de algun incoveniente favor comunicarse al whatsapp +50370959194.' + "<br><br>Att: Veterinaria Pets Paradise<p>";
    
    //*Validamos
    if(concepto != '' && fecha_hora != '' && dias_de_anticipacion.value != 0){
        //* Le indicamos que ponga el mensaje en el cuadro
        mensaje.innerHTML = contenido;
    }
    
    if(dias_de_anticipacion.value == 0 || concepto == '' || fecha_hora == ''){
        mensaje.innerHTML = '';
    }
}

function actualizar_mensaje_al_crear_vacuna(){
    //* Obtenemos las variables de la pagina
    //var concepto = document.querySelector('#vacuna_id').value;
    var nombre = document.querySelector('#nombreMascota').value;
    var fecha_hora = document.querySelector('#start').value;
    var mensaje = document.querySelector('#mensaje-recordatorio');
    var dias_de_anticipacion = document.getElementById('dias_de_anticipacion');

    //* Generamos el mensaje, basandonos en la plantilla que esta registrada en META
    var contenido = '<p><strong>Veterinaria Pet Paradise le informa</strong></p><br>' + 
    '<p>Que la cita para <span>' + nombre + '</span> de <span>' + 'la vacunacion' + '</span> esta agendada para la fecha y hora <span>' + fecha_hora + '</span>. En caso de algun incoveniente favor comunicarse al whatsapp +50370959194.' + "<br><br>Att: Veterinaria Pets Paradise<p>";
    
    //*Validamos
    if( fecha_hora != '' && dias_de_anticipacion.value != 0){
        //* Le indicamos que ponga el mensaje en el cuadro
        mensaje.innerHTML = contenido;
    }
    
    if(dias_de_anticipacion.value == 0 || fecha_hora == ''){
        mensaje.innerHTML = '';
    }
}


function actualizarMensaje_al_crear_limpieza(){
    //* Obtenemos las variables de la pagina
    var nombre = document.querySelector('#inputMascota').value;
    var fecha_hora = document.querySelector('#fechaHoraCitaLimpieza').value;
    var mensaje = document.querySelector('#mensaje-recordatorio');
    var dias_de_anticipacion = document.getElementById('dias_de_anticipacion');

    //* Generamos el mensaje, basandonos en la plantilla que esta registrada en META
    var contenido = '<p><strong>Veterinaria Pet Paradise le informa</strong></p><br>' + 
    '<p>Que la cita para <span>' + nombre + '</span> de <span>' + 'la limpieza dental' + '</span> esta agendada para la fecha y hora <span>' + fecha_hora + '</span>. <br> En caso de algun incoveniente favor comunicarse al whatsapp +50370959194.' + "<br><br>Att: Veterinaria Pets Paradise<p>";
    
    //*Validamos
    if( fecha_hora != '' && dias_de_anticipacion.value != 0){
        //* Le indicamos que ponga el mensaje en el cuadro
        mensaje.innerHTML = contenido;
    }
    
    if(dias_de_anticipacion.value == 0 || fecha_hora == ''){
        mensaje.innerHTML = '';
    }
}