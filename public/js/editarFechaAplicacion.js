$(document).ready(function(){
   
        //capturo el valor de id seleccionado
        var VacunaSeleccionada = $("#vacuna_id").find('option:first').attr('selected', true);

        //URL de la funcion
        var vacunaURL = VacunaSeleccionada.data('url');
        //trae las cosas por medio de la url
        $.get(vacunaURL, function(data) {
            $('#vacuna-dia').val(data.tiempoEntreDosisDia);
        });



        /* Jquery CALENDARIO FUNCIONAL */
        // $('#end')[0].valueAsNumber = 6e4 * (Math.floor(Date.now() / 6e4) - new Date().getTimezoneOffset());
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
            var datetimeval = $('#start').val();
            /* .getUTCDay(); */
           // console.log(datetimeval);
            //se transforma en fecha
            const date12 = new Date(datetimeval);
            //imprimo en consola para ver el dato que devuelve 0 es domingo 6 sabado
            /*  console.log(date12.getUTCDay()); */
            var weekend = date12.getUTCDay();
            //console.log(weekend);

            if (weekend == 0 | weekend == 6) {

                /* alert('Weekends not allowed'); */
                weekdayVacuna();
                //e.preventDefault();
                //$('#start').val('');
            }

        });
        $('#start').change();





});