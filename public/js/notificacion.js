//Variables
const notificacion = document.querySelector('#notificacion');
const valores = window.location.search;
const url = new URLSearchParams(valores);
var objeto = url.get('objeto');
var accion = url.get('accion');
var mj = url.get('mj');

const alerta = document.createElement('p');
alerta.setAttribute('id','alerta');

noti();

function noti(){
    if(objeto != null && accion == 'creo'){
        alerta.innerText = "El registro de " + objeto + " se " + accion + " correctamente";
        notificacion.classList.add('noti-crear');

        notificacion.appendChild(alerta);
    }
    else if(objeto != null && accion == 'edito'){
        alerta.innerText = "El registro de " + objeto + " se " + accion + " correctamente";
        notificacion.classList.add('noti-editar');

        notificacion.appendChild(alerta);
    }
    else if(objeto != null && accion == 'elimino'){
        alerta.innerText = "El registro de " + objeto + " se " + accion + " correctamente";
        notificacion.classList.add('noti-eliminar');

        notificacion.appendChild(alerta);
    }
    else if(objeto != null && accion != null){
        alerta.innerText = "El registro de " + objeto + " se " + accion + " correctamente";
        notificacion.classList.add('noti-noti');

        notificacion.appendChild(alerta);
    }
    else if (objeto == null && accion == null && mj != null){
        alerta.innerText = mj;
        notificacion.classList.add('noti-noti');

        notificacion.appendChild(alerta);
    }
}

function quitarNoti(){
    //notificacion.classList.remove("notificacion");
    //notificacion.removeChild(alerta);

    //$('#alerta').fadeOut(3000);
    $('#notificacion').fadeOut(2000);
}

setTimeout(quitarNoti, 3000);