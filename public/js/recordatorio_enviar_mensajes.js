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

    datos.forEach(Element =>{
        if(Element.estado == 0){
            fetch('/recordatorio/enviar_masivo' + '?id='+Element.id+'&nombre_mascota='+Element.nombre+'&concepto='+Element.concepto+'&fecha='+Element.fecha+'&telefono='+Element.telefono)
            .then(()=>{
                console.log('Se envio el elemento con el id: '+Element.id);
            })
        }
    });

    location.reload();
}