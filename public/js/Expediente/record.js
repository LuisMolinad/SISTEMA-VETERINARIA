//!Datepicker tipo excel
//?Modificar
var la_tabla = document.getElementsByClassName('record-tabla');
var cells_fecha = document.getElementsByClassName('record-fecha');
var cells_peso = document.getElementsByClassName('record-peso');
var cells_refuerzo = document.getElementsByClassName('record-refuerzo');


for ( var i = 0 ; i < cells_fecha.length ; i ++ ) {

    cells_fecha[i].onclick = function () {

        if(this.hasAttribute('data-clicked')){
            return;
        }

        var id_linea = this.getAttribute('id_linea');

        this.setAttribute('id', id_linea);

        this.setAttribute('data-clicked','yes');
        this.setAttribute('data-text', this.innerHTML);

        var input  = document.createElement ( 'input' ) ;
        input.setAttribute ( 'type' , 'date' ) ;
        input.value = this.innerHTML ;
        input.style.width = this.offsetWidth - ( this.clientLeft * 2 ) + "px" ;
        input.style.height = this.offsetHeight - ( this.clientTop * 2 ) + "px" ;
        input.style.border = "0px" ;
        input.style.fontFamily = "inherit" ;
        input.style.fontSize = "inherit" ;
        input.style.textAlign = "inherit" ;
        input.style.backgroundColor = "#FFFEE0" ;
        
        input.onblur = function() {
            var td = input.parentElement;
            var orig_text = input.parentElement.getAttribute('data-text');
            var current_text = this.value;

            if(orig_text != current_text){
                //Aqui hacemos la magia con la bd
                //saeve to db with ajax
                fetch('/record/edit/fecha?id='+id_linea+'&fecha='+current_text)
                .then(()=>{
                    console.log('Si hizo el cambio');
                })
                //Rosalio magia

                console.log('si');


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
        this.firstElementChild.select () ;
    }
}

//Refuerzo
for ( var i = 0 ; i < cells_refuerzo.length ; i ++ ) {

    cells_refuerzo[i].onclick = function () {

        if(this.hasAttribute('data-clicked')){
            return;
        }

        var id_linea = this.getAttribute('id_linea');

        this.setAttribute('id', id_linea);

        this.setAttribute('data-clicked','yes');
        this.setAttribute('data-text', this.innerHTML);

        var input  = document.createElement ( 'input' ) ;
        input.setAttribute ( 'type' , 'date' ) ;
        input.value = this.innerHTML ;
        input.style.width = this.offsetWidth - ( this.clientLeft * 2 ) + "px" ;
        input.style.height = this.offsetHeight - ( this.clientTop * 2 ) + "px" ;
        input.style.border = "0px" ;
        input.style.fontFamily = "inherit" ;
        input.style.fontSize = "inherit" ;
        input.style.textAlign = "inherit" ;
        input.style.backgroundColor = "#FFFEE0" ;
        
        input.onblur = function() {
            var td = input.parentElement;
            var orig_text = input.parentElement.getAttribute('data-text');
            var current_text = this.value;

            if(orig_text != current_text){
                //Aqui hacemos la magia con la bd
                //saeve to db with ajax
                fetch('/record/edit/refuerzo?id='+id_linea+'&refuerzo='+current_text)
                .then(()=>{
                    console.log('Si hizo el cambio');
                })
                //Rosalio magia

                console.log('si');


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
        this.firstElementChild.select () ;
    }
}

//peso
for ( var i = 0 ; i < cells_peso.length ; i ++ ) {

    cells_peso[i].onclick = function () {

        if(this.hasAttribute('data-clicked')){
            return;
        }

        var id_linea = this.getAttribute('id_linea');

        this.setAttribute('id', id_linea);

        this.setAttribute('data-clicked','yes');
        this.setAttribute('data-text', this.innerHTML);

        var input  = document.createElement ( 'input' ) ;
        input.setAttribute ( 'type' , 'number' ) ;
        input.value = this.innerHTML ;
        input.style.width = this.offsetWidth - ( this.clientLeft * 2 ) + "px" ;
        input.style.height = this.offsetHeight - ( this.clientTop * 2 ) + "px" ;
        input.style.border = "0px" ;
        input.style.fontFamily = "inherit" ;
        input.style.fontSize = "inherit" ;
        input.style.textAlign = "inherit" ;
        input.style.backgroundColor = "#FFFEE0" ;
        input.setAttribute('min','1');
        input.setAttribute('step','0.1');
        
        input.onblur = function() {
            var td = input.parentElement;
            var orig_text = input.parentElement.getAttribute('data-text');
            var current_text = this.value;

            if(orig_text != current_text){
                //Aqui hacemos la magia con la bd
                //saeve to db with ajax
                fetch('/record/edit/peso?id='+id_linea+'&peso='+current_text)
                .then(()=>{
                    console.log('Si hizo el cambio');
                    console.log('Sos un crack Rosalio');
                })
                //Rosalio magia

                console.log('si');


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
        this.firstElementChild.select () ;
    }
}

//!Modal
const btn_agregar_vacunacion = document.querySelector('#btn-agregar-vacunacion');
const contenedor_modal = document.querySelector('.record-space_modal');
const modal = contenedor_modal.querySelector('.record-modal');
const btn_modal_cerrar = modal.querySelector('#modal-cerrar');

btn_modal_cerrar.addEventListener('click', (e)=>{
    contenedor_modal.classList.add('none');
})

btn_agregar_vacunacion.addEventListener('click',(e)=>{
    contenedor_modal.classList.remove('none');
})

contenedor_modal.onclick = function (event) {
    if (event.target.contains(modal) && event.target !== modal) {
        // console.log('You clicked outside the box!');
        contenedor_modal.classList.add('none');
    } else {
        // console.log('You clicked inside the box!');
    }
}