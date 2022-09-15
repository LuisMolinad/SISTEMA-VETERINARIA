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
    title: 'La Fecha seleccionada es fin de semana'
  });
}


function weekdayVacuna(){
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