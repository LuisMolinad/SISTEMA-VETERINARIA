function cambioVacuna(){


      Swal.bindClickHandler()
      Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
      }).bindClickHandler('data-swal-toast-template').then((result) => {
        if (result.isConfirmed) {

           return true;
        }
        if (result.isCancel) {

            return false;
         }
      })
    
}