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