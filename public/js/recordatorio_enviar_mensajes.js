const { valuesIn } = require("lodash");

function cargar_datos(){
    var i = 0;
    var datos = [];
    document.querySelectorAll('.dato_id').forEach(element => {
        datos[i] = {
            "id" : document.querySelectorAll('.dato_id')[i].textContent.trim(),
            "nombre" : document.querySelectorAll('.dato_nombre')[i].textContent.trim(),
            "concepto" : document.querySelectorAll('.dato_concepto')[i].textContent.trim(),
            "telefono" : document.querySelectorAll('.dato_telefono')[i].textContent.trim(),
            "fecha" : document.querySelectorAll('.dato_fecha')[i].textContent.trim(),
            "fecha_enviar" : document.querySelectorAll('.dato_fecha_enviar')[i].textContent.trim(),
            "estado" : document.querySelectorAll('.dato_estado')[i].textContent.trim(),
        };

        i++;
    });

    return datos;
}

function enviar_mensajes(){
    datos = cargar_datos();
    var fecha_de_hoy = new Date();

    console.log(fecha_de_hoy.getDate() + '/' + (fecha_de_hoy.getMonth() + 1)  + '/' + fecha_de_hoy.getFullYear());

    datos.forEach(Element =>{

        var validacion = validar_fecha(Element.fecha_enviar);
        console.log(validacion);
        if(validacion.dia == fecha_de_hoy.getDate() && validacion.mes == (fecha_de_hoy.getMonth() + 1) && validacion.anio == fecha_de_hoy.getFullYear()){
            if(Element.estado == 0){
                fetch('/recordatorio/enviar_masivo' + '?id='+Element.id+'&nombre_mascota='+Element.nombre+'&concepto='+Element.concepto+'&fecha='+Element.fecha+'&telefono='+Element.telefono)
                .then(()=>{
                    console.log('Se envio el elemento con el id: '+Element.id);
                })
            }

            console.log('Fecha valida');
        }
    });

    location.reload();
}

function eliminar_mensajes(){
    fetch('recordatorio/eliminar_masivo')
    .then(()=>{
        console.log('Se elimino bien');
    })

    location.reload();
}

function validar_fecha(fecha){
    var dia = '', mes = '', anio= '', hora = '';
    var nueva_fecha = [];
    var i = 0;

    try{
        for(var i = 0 ; i < fecha.length ; i++){
            if(i<2){
                dia += fecha[i];
            }
            else if(i>2 && i<5){
                mes += fecha[i];
            }
            else if(i>5){
                anio += fecha[i];
            }
        }

        //nueva_fecha = dia + '/' + mes + '/' + anio + ' --- ' + hora;
        nueva_fecha.dia = parseInt(dia);
        nueva_fecha.mes = parseInt(mes);
        nueva_fecha.anio = parseInt(anio);
    }
    catch(exception){
        nueva_fecha = fecha;
        console.log(exception)
    }

    return nueva_fecha;
}