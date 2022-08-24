/*

! Alertas

* Funcion eliminar
Esta mostrara un mensaje que consultara si quiere eliminar el expediente, si el usuario lo acepta se borrara, de lo contrario no.
*/

const { Warning } = require("postcss");

function alerta_eliminar_propietario( nombre, id){
    var formulario = $('#EditForm'+id);
    
    

    Swal.fire({
        title: 'Esta seguro que desea eliminar a ' + nombre + '?',
        text: "No podra revertir esta decision!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo!',
        cancelButtonText: 'No, cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

            var itemArray = [];

            fetch('/mascota/consultar_por_propietario/'+id)
            .then(response=>{
                return response.json();
            })
            .then(response => {

                var texto_del_array = 'Las mascotas de ' + nombre + ' son: ';

                response.forEach(element => {
                    itemArray.push( element.nombreMascota );
                });

                //texto_del_array = itemArray.toString();

/*                 itemArray.forEach(element=>{
                    texto_del_array += "<b>" + element + "<b> ";
                }) */

                for(var a = 0; a < itemArray.length; a++){
                    if(a < itemArray.length - 1){
                        texto_del_array += "<b>" + itemArray[a] + ",<b> ";
                    }
                    else if(a == itemArray.length - 1){
                        texto_del_array += "<b>" + itemArray[a] + ".<b> ";
                    }
                }

                return texto_del_array;
            })
            .then(texto_del_array=>{
                if(texto_del_array != 'Las mascotas de ' + nombre + ' son: '){

                    Swal.fire({
                        title: 'Al borrar a ' + nombre + ' tambien lo haran sus mascotas',
                        html: texto_del_array,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borralo',
                        cancelButtonText: 'No, cancelar'
                    })
                    .then(result=>{
                        if(result.isConfirmed){
                            formulario.submit();
                        }
                    })
                }
                else{
                    Swal.fire(
                        'Se eliminara!',
                        'El registro de ' + nombre + ' sera eliminado.',
                        'success'
                    ).then((result)=>{
                        formulario.submit();
                    });
                }
            })
        }
      })

    return false;
}

function alerta_eliminar_general( nombre, id){
    var formulario = $('#EditForm'+id);
    
    

    Swal.fire({
        title: 'Esta seguro que desea eliminar a ' + nombre + '?',
        text: "No podra revertir esta decision!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo!'
      }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire(
                'Se eliminara!',
                'El registro de ' + nombre + ' sera eliminado.',
                'success'
            ).then((result)=>{
                formulario.submit();
            });

        }
      })

    return false;
}

function alerta_eliminar_tiposervicio( nombre, id){
    var formulario = $('#BorrarForm'+id);
    
    Swal.fire({
        title: '¿Está seguro que desea eliminar el tipo de servicio ' + nombre + '?',
        text: "¡No podra revertir esta decision!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar',
        cancelButtonText: 'No, cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch('/consultarCitasServicioPorIdServicio/'+id)
            .then(response=>{
                return response.json();
            })
            .then(response => {

                var texto_del_array = 'Las mascotas de ' + nombre + ' son: ';

                response.forEach(element => {
                    itemArray.push( element.nombreMascota );
                });

                //texto_del_array = itemArray.toString();

/*                 itemArray.forEach(element=>{
                    texto_del_array += "<b>" + element + "<b> ";
                }) */

                for(var a = 0; a < itemArray.length; a++){
                    if(a < itemArray.length - 1){
                        texto_del_array += "<b>" + itemArray[a] + ",<b> ";
                    }
                    else if(a == itemArray.length - 1){
                        texto_del_array += "<b>" + itemArray[a] + ".<b> ";
                    }
                }

                return texto_del_array;
            })
            .then(texto_del_array=>{
                if(texto_del_array != 'Las mascotas de ' + nombre + ' son: '){

                    Swal.fire({
                        title: 'Al borrar a ' + nombre + ' tambien lo haran sus mascotas',
                        html: texto_del_array,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borralo',
                        cancelButtonText: 'No, cancelar'
                    })
                    .then(result=>{
                        if(result.isConfirmed){
                            formulario.submit();
                        }
                    })
                }
                else{
                    Swal.fire(
                        'Se eliminara!',
                        'El registro de ' + nombre + ' sera eliminado.',
                        'success'
                    ).then((result)=>{
                        formulario.submit();
                    });
                }
            })
        }
      })

    return false;
}

function alerta_eliminar_citaVacuna( nombreVacuna,id){
    var formulario = $('#EditForm'+id);
    
    Swal.fire({
        title: 'Esta seguro que desea eliminar la cita de vacunación de:  ' + nombreVacuna + '?',
        text: "No podra revertir esta decision!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo!'
      }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire(
                'Se eliminara!',
                'El registro de la cita de vacuna para ' + nombreVacuna + ' sera eliminado.',
                'success'
            ).then((result)=>{
                formulario.submit();
            });

        }
      })

    return false;
}

function alerta_deshabilitar_tiposervicio( nombre, id){
    var formulario = $('#DeshabilitarForm'+id);
    
    Swal.fire({
        title: '¿Está seguro que desea deshabilitar el servicio ' + nombre + '?',
        text: "No se eliminarán las citas creadas de este servicio, pero ya no podrá crearlas.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, deshabilitar',
        cancelButtonText: 'No, cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Se deshabilitará!',
                'El servicio '+nombre+' será deshabilitado.',
                'success'
            ).then((result)=>{
                formulario.submit();
            });
        }
      })

    return false;
}

function alerta_habilitar_tiposervicio( nombre, id){
    var formulario = $('#HabilitarForm'+id);
    
    Swal.fire({
        title: '¿Está seguro que desea habilitar el servicio ' + nombre + '?',
        text: "Al habilitarlo, podrá crear citas de este servicio.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, habilitar',
        cancelButtonText: 'No, cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Se habilitará!',
                'El servicio '+nombre+' será habilitado.',
                'success'
            ).then((result)=>{
                formulario.submit();
            });
        }
      })

    return false;
}

function alerta_eliminar_cirugia( nombre,id){
    var formulario = $('#EditForm'+id);
    
    Swal.fire({
        title: '¿Está seguro que desea eliminar la cita de cirugía de:  ' + nombre + '?',
        text: "Se eliminará la cita de cirugía de la mascota y no podrá revertir dicha acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo',
        cancelButtonText: 'No, cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire(
                '¡Se eliminará!',
                'El registro de la cita de cirugía para ' + nombre + ' será eliminada.',
                'success'
            ).then((result)=>{
                formulario.submit();
            });

        }
      })

    return false;
}