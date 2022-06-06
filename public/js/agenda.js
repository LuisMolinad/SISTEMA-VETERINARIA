document.addEventListener('DOMContentLoaded', function() {
    
    var calendarEl = document.getElementById('agenda');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      
        initialView: 'dayGridMonth', /*Inicializa por medio de la vista de mes*/
        locale:'es', /*Idioma espanol*/

        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },

        dateClick:function(info){
            $("#evento").modal("show");
        }

    });
    calendar.render();
  });