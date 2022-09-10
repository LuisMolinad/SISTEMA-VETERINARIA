$(document).ready(function(){
    
    var valor_inicial = ''; //variable para ir comparando
    $("#vacuna_id").change(function() {
        //capturo el valor de id seleccionado


        var VacunaSeleccionada = $(this).find('option:selected');
        //texto que captura la seleccion previa oculto
        var valor_texto = $('#seleccion').val();
        //   console.log('Valor del input previo ' + valor_texto + ' valor_texto');
        var valor_opcion = $(this).find('option:selected').text();
        //seleccionado sin espacios
        valorOpcion = jQuery.trim(valor_opcion);
        // console.log('Valor del input seleccionado ' + valorOpcion + ' valorOpcion');
        //si el actual es diferente al que estaba antes se alerta
        if (valor_texto != valorOpcion) {
            //de sweet alert
            cambioVacuna();
            //detecta hasta el segundo cambio
        }
        //URL de la funcion
        var vacunaURL = VacunaSeleccionada.data('url');
        //trae las cosas por medio de la url
        $.get(vacunaURL, function(data) {
            $('#vacuna-dia').val(data.tiempoEntreDosisDia);
        })

        valor_inicial = valorOpcion;
        $('#seleccion').val(valor_inicial);

        // Reiniciamos si hay un cambio 
        document.getElementById("end").value = "";
        document.getElementById("start").value = "";

        $("#dias_de_anticipacion").val("");

    });


    /* Jquery CALENDARIO FUNCIONAL */
    $('#end')[0].valueAsNumber = 6e4 * (Math.floor(Date.now() / 6e4) - new Date().getTimezoneOffset());
    $('#end').change(function() {
        var date = new Date(this.valueAsNumber);


        //los dias del input oculto validados
        var dias = parseInt($("#vacuna-dia").val(), 10);
        //alert para testear
        //alert($("#vacuna-dia").val());
        date.setDate(date.getDate() + dias);
        //le asigno el valor
        $('#start')[0].valueAsNumber = +date;

        //atrapo el valor de fecha de refuerzo
        var datetimeval = $('#start').val(); /* .getUTCDay(); */
        //se transforma en fecha
        const date12 = new Date(datetimeval);
        //imprimo en consola para ver el dato que devuelve 0 es domingo 6 sabado
        console.log(date12.getUTCDay());
        var weekend = date12.getUTCDay();

        if (weekend == 0 | weekend == 6) {

            /* alert('Weekends not allowed'); */
            weekday();
            //e.preventDefault();
            //$('#start').val('');
        }

    });
    $('#start').change();





});