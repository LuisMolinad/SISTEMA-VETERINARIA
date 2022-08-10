//Variables
var especiei = document.querySelector('.especie-i');
var lista = document.querySelector('.lista-es');
var col = document.querySelector('.especie-c');

//Llamamos la funcion
ejecutar();

lista.addEventListener('click', function(event){ ejecutar(); });

function ejecutar(){

    if(lista.value == 'Otro'){
        otro();
    }
    else if(lista.value != 'Otro'){
        normal();
    }
}

function normal(){
    lista.setAttribute("id", "especie");
    especiei.removeAttribute("id");
    lista.setAttribute("name", "especie");
    especiei.removeAttribute("name");
    especiei.removeAttribute("required");
    especiei.classList.add("ocultar");
    especiei.classList.remove("mostrar");

    col.classList.remove('dos-col');
}

function otro(){
    especiei.setAttribute("id", "especie");
    lista.removeAttribute("id");
    especiei.setAttribute("name", "especie");
    lista.removeAttribute("name");
    especiei.setAttribute("required", "true");
    especiei.classList.add("mostrar");
    especiei.classList.remove("ocultar");

    col.classList.add('dos-col');
}