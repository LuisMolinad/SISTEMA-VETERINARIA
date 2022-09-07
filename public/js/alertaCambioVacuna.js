function cambioVacuna(){
  var toastMixin = Swal.mixin({
    toast: true,
    icon: 'info',
    title: 'General Title',
/*     animation: false, */
    position: 'top-right',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    
  });



  document.getElementById('vacuna_id').addEventListener('mousedown', function(){
    toastMixin.fire({
      /* animation: true, */
      title: 'Si cambia la vacuna, se reiniciará la fecha y recordatorio'
    });
  }); 

/*   document.querySelector('.custom-select').addEventListener('change', function(){
    toast.fire({
      animation: true,
      title: 'Vacuna Cambiada'
    });
  }); */

 
    
}

function weekday(){
    var toast = Swal.mixin({
    toast: true,
    icon: 'warning',
    title: 'General Title',
    /* animation: false, */
    position: 'top-right',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    
  });

  toast.fire({
   /*  animation: true, */
    title: 'La Fecha de Refuerzo es fin de semana'
  });
  
}