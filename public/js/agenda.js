document.addEventListener('DOMContentLoaded', function() {
    

    //Obtenemos los campos del formulario
    let formulario = document.querySelector("form");


    var calendarEl = document.getElementById('agenda');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      
        initialView: 'dayGridMonth', /*Inicializa por medio de la vista de mes*/
        locale:'es', /*Idioma espanol*/

        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },

        //Mostramos los datos consultados de la base de datos en el controller por medio de events
        events:"http://127.0.0.1:8000/mostrar",

        dateClick:function(info){
            
            formulario.reset();
            //Recupero el dia en base al seleccionado en el calendario
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;

            $("#evento").modal("show");
        },

        //Obtiene la informacion del evento seleccionado
        eventClick:function(info){
            var evento = info.event;
            console.log(evento);

            axios.post(baseURL+"/editar/"+info.event.id).
            then(
                (respuesta)=>{
                    //Recupero la informacion de la base de datos y la coloco para que se muestre
                    formulario.id.value = respuesta.data.id;
                    formulario.title.value = respuesta.data.title;
                    formulario.descripcion.value = respuesta.data.descripcion;
                    formulario.start.value = respuesta.data.start;
                    formulario.end.value = respuesta.data.end;
                    

                    $("#evento").modal("show");
                }
                ).catch(
                    error=>{
                        if(error.response.data);
                    }
                )

        }

    });
    calendar.render();


    //Capturamos la accion del boton
    document.getElementById("btnguardar").addEventListener("click",function(){
        //console.log(formulario.title.value);
        envioDeDatos("/agregar");
        
    });


    //Creo una funcion para que no se manejen los eventos de forma local
    function envioDeDatos(url){

        const datosformulario = new FormData(formulario);
        //console.log(datosformulario);

        const nuevaUrl = baseURL+url;

        axios.post(nuevaUrl, datosformulario).
        then(
            (respuesta)=>{
                calendar.refetchEvents();
                $("#evento").modal("hide");
            }
            ).catch(
                error=>{
                    if(error.response.data);
                }
            )
    }



  });