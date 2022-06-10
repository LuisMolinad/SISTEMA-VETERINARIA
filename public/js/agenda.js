document.addEventListener('DOMContentLoaded', function() {
    

    //Obtenemos los campos del formulario
    let formulario = document.querySelector("#agregarcitasservicios");
    let formularioCaptura = document.querySelector("#operacionesservicio")

    function getColor() {
        var colorinput = document.getElementById("color");
        console.log(formulario[5].value);
        //Capturo por id los valores y asigno el color
        if(formulario[5].value == 1){
            formulario[9].value = "#6DC36D";
        }else{
            formulario[9].value = "#024A86";
        }
        //console.log(formulario[9].value);
    }

   
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
        //events:"http://127.0.0.1:8000/mostrar",
        //events: citaServicios,
        
        //Capturamos las citas de servicios, citas de vacunacion y citas de cirugias en el calendario
        eventSources: [

            //Colocar eventos
            {
              url: '/mostrar',
            },

            {
                url: '/mostrarvacunas', // use the `url` property
                color: 'yellow',    // an option!
                textColor: 'black'  // an option!
              }
          ],
        
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
            //console.log(evento);

            axios.post(baseURL+"/editar/"+info.event.id).
            then(
                (respuesta)=>{
                    //Recupero la informacion de la base de datos y la coloco para que se muestre
                    //al momento de presionar una cita [Mostrar]
                    formularioCaptura.id.value = respuesta.data.id;
                    formularioCaptura.title.value = respuesta.data.title;
                    formularioCaptura.horaServicio.value = respuesta.data.horaServicio;
                    formularioCaptura.start.value = respuesta.data.start; //Fecha de servicio
                    formularioCaptura.clienteServicio.value = respuesta.data.clienteServicio;
                    formularioCaptura.telefonoServicio.value = respuesta.data.telefonoServicio;
                    formularioCaptura.descripcion.value = respuesta.data.descripcion;
                    formularioCaptura.clienteServicio.value = respuesta.data.clienteServicio;
                    formularioCaptura.tipoServicio_id.value = respuesta.data.tipoServicio_id;
                    formularioCaptura.end.value = respuesta.data.end;
                    

                    //Desactivamos para que el usuario no pueda editar
                    formularioCaptura.title.disabled = true;
                    formularioCaptura.horaServicio.disabled = true;
                    formularioCaptura.start.disabled = true;
                    formularioCaptura.clienteServicio.disabled = true;
                    formularioCaptura.telefonoServicio.disabled = true;
                    formularioCaptura.descripcion.disabled = true;
                    formularioCaptura.clienteServicio.disabled = true;
                    formularioCaptura.tipoServicio_id.disabled = true;

                    $("#eventoconsulta").modal("show");
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

        //Capturo los datos del formulario
        var formato_telefono = /^[0-9]{8}$/;
        var telefono = formulario.telefonoServicio.value;

        //Validaciones de campos
        if(formulario.title.value == ""){
            document.getElementById("validaragendar").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el nombre de la mascota</div>';
            document.getElementById("title").focus();
            return false;
        }else if (formulario.horaServicio.value == ""){
            //alert("La hora es requerida");
            document.getElementById("validaragendar").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese la hora</div>';
            document.getElementById("horaServicio").focus();
            return false;
        }else if (formulario.clienteServicio.value == ""){
            //alert("El cliente es requerido");
            document.getElementById("validaragendar").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el nombre del Propietario</div>';
            document.getElementById("clienteServicio").focus();
            return false;
        }else if(formulario.telefonoServicio.value == ""){
            //alert("El telefono es requerido");
            document.getElementById("validaragendar").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el numero de telefono del Propietario</div>';
            document.getElementById("telefonoServicio").focus();
            return false;
        }else if(!formato_telefono.test(telefono)){
         //alert("El telefono debe tener 8 digitos");
         document.getElementById("validaragendar").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>El telefono debe tener 8 digitos numericos</div>';
         return false;
        }
        else if (formulario.descripcion.value == ""){
            //alert("La descripcion es requerida");
            document.getElementById("validaragendar").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese una observacion</div>';
            document.getElementById("descripcion").focus();
            return false;
        } 

        //variable para capturar la hora, esto es la ubicacion del formulario
        let posicionHora = 3;
        let posicionFecha = 4;

        let hora = formulario[posicionHora].value;
        formulario[posicionFecha].value += " " + hora;

        //Obtengo el color del evento
        getColor();

        const datosformulario = new FormData(formulario);
        console.log(formulario[4].value);
        

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

    async function recepcionDatos(url){
    
        const nuevaUrl = baseURL+url;

        await axios.get(nuevaUrl)
        .then(function (response) {
          // handle success
          console.log(response);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })

    
    }

  });