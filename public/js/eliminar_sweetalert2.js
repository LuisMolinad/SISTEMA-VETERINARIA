/*

! Alertas

* Funcion eliminar
Esta mostrara un mensaje que consultara si quiere eliminar el expediente, si el usuario lo acepta se borrara, de lo contrario no.
*/

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

function alerta_eliminar_servicio( nombre, id){
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