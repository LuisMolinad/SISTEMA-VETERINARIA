function cambioVacuna(){


      Swal.bindClickHandler()
      Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
      }).bindClickHandler('data-swal-toast-template').then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Saved!', '', 'success')
          } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
          }
      })
    
}