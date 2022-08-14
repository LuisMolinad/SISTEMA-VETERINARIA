/*Vista para crear recordatorio*/

function actualizar_mensaje_al_crear(){
    //* Obtenemos las variables de la pagina
    var concepto = document.querySelector('#ConceptoCirugia').value;
    var nombre = document.querySelector('#inputNombreMascota').value;
    var fecha_hora = document.querySelector('#fechaHoraCitaCirugia').value;
    var mensaje = document.querySelector('#mensaje-recordatorio');
    var dias_de_anticipacion = document.getElementById('dias_de_anticipacion');

    //* Generamos el mensaje, basandonos en la plantilla que esta registrada en META
    var contenido = '<p>Que la cita para <span>' + nombre + '</span> de <span>' + concepto + '</span> esta agendada para la fecha y hora <span>' + fecha_hora + '</span>. En caso de algun incoveniente favor comunicarse al whatsapp +50370959194.' + "<br><br>Att: Veterinaria Pets Paradise<p>";
    
    //*Validamos
    if(concepto != '' && fecha_hora != '' && dias_de_anticipacion.value != 0){
        //* Le indicamos que ponga el mensaje en el cuadro
        mensaje.innerHTML = contenido;
    }
    
    if(dias_de_anticipacion.value == 0 || concepto == '' || fecha_hora == ''){
        mensaje.innerHTML = '';
    }
}