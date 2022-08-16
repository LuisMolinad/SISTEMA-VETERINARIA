document.addEventListener("DOMContentLoaded", function () {
    //Obtenemos los campos del formulario
    let formulario = document.querySelector("#agregarcitasservicios");
    let formularioCaptura = document.querySelector("#operacionesservicio");

    //formulario para editar citas de servicios
    let formularioEdit = document.querySelector("#editarServicio");

    let formularioCitasVacunas = document.querySelector("#agendavacunas");
    let formularioCitasCirugias = document.querySelector("#agendacirugias");
    let formularioCitasDentales = document.querySelector("#agendaDental");

    function getColor() {
        var colorinput = document.getElementById("color");
        //console.log(formulario[5].value);
        //Capturo por id los valores y asigno el color
        if (formulario[5].value == 1) {
            //Servicio de corte
            formulario[9].value = "#C82A54";
        } else if (formulario[5].value == 2) {
            //Servicio de baño y corte
            formulario[9].value = "#024A86";
        } else if (formulario[5].value == 3 ) {
            //formulario[9].value = "#7A1453";
            formulario[9].value = "#E36B2C";
        } else {
            formulario[9].value = "#8C4966";
        }
        //console.log(formulario[9].value);

        if (formularioEdit[5].value == 1) {
            //Servicio de corte
            formularioEdit[9].value = "#C82A54";
        } else if (formularioEdit[5].value == 2) {
            //Servicio de baño y corte
            formularioEdit[9].value = "#024A86";
        } else if (formularioEdit[5].value == 3 ) {
            //formularioEdit[9].value = "#7A1453";
            formularioEdit[9].value = "#E36B2C";
        } else {
            formularioEdit[9].value = "#8C4966";
        }


    }

    var calendarEl = document.getElementById("agenda");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth" /*Inicializa por medio de la vista de mes*/,
        locale: "es" /*Idioma espanol*/,

        headerToolbar: {
            left: "prevYear,prev,next,nextYear,today",
            center: "title",
            //dayGridWeek, timeGridWeek, timeGridDay
            right: "dayGridMonth,dayGridWeek,dayGridDay,listWeek",
            //right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
        },
        //editable: true, //para que puedan moverse los eventos
        //dayMaxEvents: true, // cuando se encuentran muchos eventos se mostrara una burbuja

        //Formato de Tiempo
        eventTimeFormat: { // like '14:30:00'
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
          },

        //Mostramos los datos consultados de la base de datos en el controller por medio de events
        //events:"http://127.0.0.1:8000/mostrar",
        //events: citaServicios,

        //Capturamos las citas de servicios, citas de vacunacion y citas de cirugias en el calendario
        eventSources: [
            //Colocar eventos
            {
                //Citas de servicios
                url: "/mostrar",
                display: 'block',
            },

            {
                //Citas de vacunacion
                url: "/mostrarvacunas",
                color: "green",
                display: 'block', /*Muestra el evento con color de relleno*/
                /*textColor: "black",*/
            },

            {
                //Citas de cirugias
                url: "/mostrarcirugias",
                color: "red",
                display: 'block',
            },

            {
                //Citas de limpieza dental
                url: "/mostrarlimpiezadental",
                color: "#7A1453",
                display: 'block',
            },

        ],

        dateClick: function (info) {

           formulario.reset();
           //Recupero el dia en base al seleccionado en el calendario
           formulario.start.value = info.dateStr;
           //formulario.end.value = info.dateStr;
    
           $("#evento").modal("show"); 
        },

        eventDidMount: function(info) {
            let val = selector.value; //Obtiene el valor del select
            //console.log(info.event.extendedProps)

            //Agregar en todas las tablas de cirugia,servicios,vacunas un campo de filtro
            if (!(val == info.event.extendedProps.filtercirugias || val == info.event.extendedProps.filtervacunas ||
                val == info.event.extendedProps.filterservicios || 
                val == info.event.extendedProps.filterLimpiezaDental||val == "all")) {
                info.el.style.display = "none";
            }
          },

        //Obtiene la informacion del evento seleccionado
        eventClick: function (info) {

            //Cuando utilizo el formularioCaptura es para el consultar/eliminar
            //Cuando utilizo el formularioEdit es para el editar

            bloquearCampos();
            var evento = info.event;
            console.log(evento);
            if (evento.groupId == "citasServicios") {
                axios
                    .post(baseURL + "/editar/" + info.event.id)
                    .then((respuesta) => {
                        //Recupero la informacion de la base de datos y la coloco para que se muestre
                        //al momento de presionar una cita [Mostrar]


                        formularioCaptura.tipoServicio_id.value = respuesta.data.tipoServicio_id;

                        //Debo de ver como capturar el valor del id en el select
                        formularioEdit.tipoServicio_id.value = respuesta.data.tipoServicio_id;
                        

                        axios.get(
                            baseURL + "/tipoServicios/" + respuesta.data.tipoServicio_id
                        ).then((res) => {
                            formularioCaptura.tipoServicio_id.value = res.data.nombreServicio;
                            //ver si captura, en ves de value, se debe de poner option
                            formularioEdit.tipoServicio_id.option = res.data.nombreServicio;
                            console.log(formularioEdit.tipoServicio_id.option)
                        });

                        formularioCaptura.id.value = respuesta.data.id;
                        formularioCaptura.title.value = respuesta.data.title;
                        formularioCaptura.horaServicio.value =
                            respuesta.data.horaServicio;
                        formularioCaptura.start.value = respuesta.data.start; //Fecha de servicio
                        formularioCaptura.clienteServicio.value =
                            respuesta.data.clienteServicio;
                        formularioCaptura.telefonoServicio.value =
                            respuesta.data.telefonoServicio;
                        formularioCaptura.descripcion.value =
                            respuesta.data.descripcion;
                        formularioCaptura.clienteServicio.value =
                            respuesta.data.clienteServicio;
                        
                        formularioCaptura.end.value = respuesta.data.end;


                        //Editar
                        formularioEdit.id.value = respuesta.data.id;
                        formularioEdit.title.value = respuesta.data.title;
                        formularioEdit.horaServicio.value = respuesta.data.horaServicio;
                        formularioEdit.start.value = respuesta.data.start; //Fecha de servicio
                        formularioEdit.clienteServicio.value =respuesta.data.clienteServicio;
                        formularioEdit.telefonoServicio.value =respuesta.data.telefonoServicio;
                        formularioEdit.descripcion.value =respuesta.data.descripcion;
                        formularioEdit.clienteServicio.value = respuesta.data.clienteServicio;
                        //formularioEdit.end.value = respuesta.data.end;
                        //Con este campo obtengo el color de la cita de servicio
                        formularioEdit.color.value = respuesta.data.color;


                        //Desactivamos para que el usuario no pueda editar
                        $("#eventoconsulta").modal("show");
                    })
                    .catch((error) => {
                        if (error.response.data);
                    });
            }
            if (evento.groupId == "citasVacunacion") {
                axios
                    .get(baseURL + "/editarCitaVacuna/" + info.event.id)
                    .then((respuesta) => {
                        formularioCitasVacunas.mascota_id.value =
                            respuesta.data.mascota_id;
                        
                            //Obtener el nombre de la vacuna
                            axios.get(
                                baseURL + "/vacunas/" + respuesta.data.vacuna_id
                            )
                            .then((res) => {
                                formularioCitasVacunas.vacuna_id.value =
                                    res.data.nombreVacuna;
                            });

                            //Obtengo datos que no dependen de las tablas
                            formularioCitasVacunas.title.value = respuesta.data.title;
                            formularioCitasVacunas.start.value = respuesta.data.start;
                            formularioCitasVacunas.pesolb.value = respuesta.data.pesolb + " lb";


                        $("#eventoconsultavacunas").modal("show");
                    })
                    .catch((error) => {});
            }

            if(evento.groupId == "citasCirugias"){
            axios.get(baseURL + "/editarCitaCirugia/" + info.event.id)
            .then((respuesta)=>{
                formularioCitasCirugias.title.value = respuesta.data.title;
                formularioCitasCirugias.start.value = respuesta.data.start;
                formularioCitasCirugias.conceptoCirugia.value = respuesta.data.conceptoCirugia;
                formularioCitasCirugias.recomendacionPreoOperatoria.value = respuesta.data.recomendacionPreoOperatoria;

                $("#eventoconsultacirugias").modal("show");

            })
            }

            if(evento.groupId == "citasLimpiezaDental"){
                axios.get(baseURL + "/editarCitaLimpiezaDental/" + info.event.id)
                .then((respuesta)=>{
                    formularioCitasDentales.title.value = respuesta.data.title;
                    formularioCitasDentales.start.value = respuesta.data.start;
                    $("#eventoconsultadental").modal("show");
                })
            }


        },
    });
    calendar.render();

    //Refresca el selector para que pueda mostrar las citas correspondientes
    selector.addEventListener('change', function() {
        calendar.refetchEvents();
      });

    function bloquearCampos() {
        formularioCaptura.title.disabled = true;
        formularioCaptura.horaServicio.disabled = true;
        formularioCaptura.start.disabled = true;
        formularioCaptura.clienteServicio.disabled = true;
        formularioCaptura.telefonoServicio.disabled = true;
        formularioCaptura.descripcion.disabled = true;
        formularioCaptura.clienteServicio.disabled = true;
        formularioCaptura.tipoServicio_id.disabled = true;
        formularioCitasVacunas.mascota_id.disabled = true;
        formularioCitasVacunas.vacuna_id.disabled = true;
        formularioCitasVacunas.start.disabled = true;
        formularioCitasVacunas.estadoCita.disabled = true;
        formularioCitasVacunas.pesolb.disabled = true;
        formularioCitasVacunas.title.disabled = true;
        formularioCitasCirugias.title.disabled = true;
        formularioCitasCirugias.start.disabled = true;
        formularioCitasCirugias.conceptoCirugia.disabled = true;
        formularioCitasCirugias.recomendacionPreoOperatoria.disabled = true;
        formularioCitasDentales.start.disabled = true;
        formularioCitasDentales.title.disabled = true;
    }

    //Capturamos la accion del boton agregar
    document
        .getElementById("btnguardar")
        .addEventListener("click", function () {
            //console.log(formulario.title.value);
            envioDeDatos("/agregar");
        });

        

    document
        .getElementById("btneliminar")
        .addEventListener("click", function () {
            //console.log(formulario.title.value);

            Swal.fire({
                title: 'Esta seguro que desea eliminar la cita de servicio de la mascota ' + formularioEdit.title.value + '?',
                text: "No podra revertir esta decision!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!',
                cancelButtonText: 'No'
              }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Se elimino de manera exitosa',
                        'El registro de ' + formularioEdit.title.value + ' se ha eliminado.',
                        'success'
                    ).then((result)=>{
                        envioDatosD("/borrar/" + formularioCaptura.id.value);
                    });
                }
              })
            return false;
        });    

    //Capturamos la accion del boton actualizar    
    document
        .getElementById("btneditar")
        .addEventListener("click", function () {
        //console.log(formulario.title.value);
        envioDatosEdit("/actualizar/"+ formularioEdit.id.value);   
        //console.log("valor del id " + formularioEdit.id.value)
    });

    //Creo una funcion para que no se manejen los eventos de forma local
    function envioDeDatos(url) {
        //Capturo los datos del formulario
        var formato_telefono = /^[0-9]{8}$/;
        var telefono = formulario.telefonoServicio.value;

        //Validaciones de campos
        if (formulario.title.value == "") {
                document.getElementById("validaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el nombre de la mascota</div>'; 
                guardarvalidado();
            document.getElementById("title").focus();
            return false;
        } else if (formulario.horaServicio.value == "") {
            //alert("La hora es requerida");
            document.getElementById("validaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese la hora</div>';
                guardarvalidado();
                document.getElementById("horaServicio").focus();
            return false;
        } else if (formulario.clienteServicio.value == "") {
            //alert("El cliente es requerido");
            document.getElementById("validaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el nombre del Propietario</div>';
                guardarvalidado();
                document.getElementById("clienteServicio").focus();
            return false;
        } else if (formulario.telefonoServicio.value == "") {
            //alert("El telefono es requerido");
            document.getElementById("validaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el numero de telefono del Propietario</div>';
                guardarvalidado();
                document.getElementById("telefonoServicio").focus();
            return false;
        } else if (!formato_telefono.test(telefono)) {
            //alert("El telefono debe tener 8 digitos");
            document.getElementById("validaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>El telefono debe tener 8 digitos numericos</div>';
                guardarvalidado();
                return false;
        } else if (formulario.descripcion.value == "") {
            //alert("La descripcion es requerida");
            document.getElementById("validaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese una observacion</div>';
                guardarvalidado();
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

       //console.log(formulario[11].value);
        
        const datosformulario = new FormData(formulario);
        //console.log(formulario[4].value);

        const nuevaUrl = baseURL + url;

        axios
            .post(nuevaUrl, datosformulario)
            .then((respuesta) => {
                calendar.refetchEvents();
                $("#evento").modal("hide");

                //crea el elemento de la alerta una vez se guarda el registro
                document.getElementById("guardadocorrectamente").innerHTML =
                '<div class="alert alert-success alert-dismissible fade show" role="alert">' + 
                '<button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>' +
                'La cita de servicio ha sido guardada exitosamente!</div>';
                
                //Para que aparezca el mensaje una vez agregado
                $("#guardadocorrectamente").fadeTo(2000,500).slideUp(500,function(){
                    $("#guardadocorrectamente").slideUp(500);
                })
            })
            .catch((error) => {
                if (error.response.data);
            });
    }

    //Esta funcion maneja el modal de eliminar
    function envioDatosD(url) {

        const datosformularioCaptura = new FormData(formularioCaptura);
        console.log(formularioCaptura[1].value);
        console.log(formularioCaptura[4].value);

        const nuevaUrlED = baseURL + url;

        axios.post(nuevaUrlED, datosformularioCaptura).then((respuesta) => {
                calendar.refetchEvents();
                $("#eventoconsulta").modal("hide");

                //crea el elemento de la alerta una vez se eliminado el registro
                document.getElementById("eliminadocorrectamente").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">' + 
                '<button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>' +
                'La cita de servicio ha sido eliminada exitosamente!</div>';

                //Para que aparezca el mensaje una vez Eliminado
                $("#eliminadocorrectamente").fadeTo(2000,500).slideUp(500,function(){
                    $("#eliminadocorrectamente").slideUp(500);
                })
                
            })
            .catch((error) => {
                if (error.response.data);
                console.log("ERRRR:: ",error.response.data);
            });
    }


    //Esta funcion maneja el modal de editar
    function envioDatosEdit(url) {

        //Capturo los datos del formulario
        var formato_telefono = /^[0-9]{8}$/;
        var telefono = formularioEdit.telefonoServicio.value;

        //Validaciones de campos
        if (formularioEdit.title.value == "") {
            document.getElementById("validareditaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el nombre de la mascota</div>';
                editarvalidado();
                document.getElementById("title").focus();
            return false;
        } else if (formularioEdit.horaServicio.value == "") {
            //alert("La hora es requerida");
            document.getElementById("validareditaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese la hora</div>';
                editarvalidado();
            document.getElementById("horaServicio").focus();
            return false;
        } else if (formularioEdit.clienteServicio.value == "") {
            //alert("El cliente es requerido");
            document.getElementById("validareditaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el nombre del Propietario</div>';
                editarvalidado();
            document.getElementById("clienteServicio").focus();
            return false;
        } else if (formularioEdit.telefonoServicio.value == "") {
            //alert("El telefono es requerido");
            document.getElementById("validareditaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese el numero de telefono del Propietario</div>';
                editarvalidado();
            document.getElementById("telefonoServicio").focus();
            return false;
        } else if (!formato_telefono.test(telefono)) {
            //alert("El telefono debe tener 8 digitos");
            document.getElementById("validareditaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>El telefono debe tener 8 digitos numericos</div>';
                editarvalidado();
            return false;
        } else if (formularioEdit.descripcion.value == "") {
            //alert("La descripcion es requerida");
            document.getElementById("validareditaragendar").innerHTML =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="" class="close" data-dismiss="alert">&times;</a>Porfavor ingrese una observacion</div>';
                editarvalidado();
            document.getElementById("descripcion").focus();
            return false;
        }

        //variable para capturar la hora, esto es la ubicacion del formulario
        let posicionHora = 3;
        let posicionFecha = 4;

        let hora = formularioEdit[posicionHora].value;
        formularioEdit[posicionFecha].value += " " + hora;
        console.log(formularioEdit[posicionFecha].value)

        //Obtengo el color del evento
        getColor();

        //console.log(formularioCaptura[11].value);
        
        const datosformularioCaptura = new FormData(formularioEdit);
        //console.log(formularioEdit[1].value);
        

        const nuevaUrlED = baseURL + url;

        axios.post(nuevaUrlED, datosformularioCaptura).then((respuesta) => {
                calendar.refetchEvents();
                $("#eventoeditar").modal("hide");

                 //crea el elemento de la alerta una vez se editado el registro
                document.getElementById("editadocorrectamente").innerHTML =
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 
                '<button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>' +
                'La cita de servicio ha sido actualizada exitosamente!</div>';

                //Para que aparezca el mensaje una vez editado
            $("#editadocorrectamente").fadeTo(2000,500).slideUp(500,function(){
                $("#editadocorrectamente").slideUp(500);
            }) 

            })
            .catch((error) => {
                if (error.response.data);
                //console.log("ERRRR:: ",error.response.data);
            });
    }

    //Funcion para mostrar el modal de editar
    $(document).on('click', '#btniraeditar', function() {
        $("#eventoeditar").modal("show");
        $("#eventoconsulta").modal("hide");
        
    });

    function guardarvalidado(){
        $("#validaragendar").fadeTo(2000,500).slideUp(500,function(){
            $("#validaragendar").slideUp(500);
        })
    }

    function editarvalidado(){
        $("#validareditaragendar").fadeTo(2000,500).slideUp(500,function(){
            $("#validareditaragendar").slideUp(500);
        })
    }
    
});



