$(document).ready(function(){
    
    //Sí yo sé todo succede de forma secuencial
    //Antes solo Dios y yo sabiamos que hacia este code, ahora solo DIOS sabe

  


    /* Jquery CALENDARIO FUNCIONAL */
    $('#fechaHoraCitaCirugia')[0].valueAsNumber = 6e4 * (Math.floor(Date.now() / 6e4) - new Date().getTimezoneOffset());
    $('#fechaHoraCitaCirugia').change(function() {
     
        //atrapo el valor de fecha de cirugia
        var datetimeval = $('#fechaHoraCitaCirugia').val(); /* .getUTCDay(); */
        //se transforma en tipo fecha
        const date12 = new Date(datetimeval);
        //imprimo en consola para ver el dato que devuelve 0 es domingo 6 sabado
        console.log(date12.getUTCDay());
        var weekend = date12.getUTCDay();

        if (weekend == 0 | weekend == 6) {

           //alerta de fin de semana
            weekday();
         
        }

    });
   // $('#start').change();





});