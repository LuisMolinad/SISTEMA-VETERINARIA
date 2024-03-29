<!-- Modal unicamente para mostrar informacion, este se actualizara para el editar/borrar-->
<div class="modal fade" id="eventoconsultacirugias" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos Cita Cirugia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <!--Coloco los campos de llenado -->
  
                <form action="" id="agendacirugias"> <!-- Se declara esta accion para poder capturar los datos del formulario -->
                  {!! csrf_field() !!} <!--Captura los formularios unicamente del formulario-->
                  
  
                    <div class="form-group d-none">
                      <label for="id">ID</label>
                      <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="title">Id de la mascota: </label>
                      <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                      <label for="nombreMascota">Nombre de la mascota: </label>
                      <input type="text" name="nombreMascota" id="nombreMascota" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                  <div class="form-group d-none">
                  <label for="mascota_id">Nombre de Mascota</label>
                  <input type="text" name="mascota_id" id="mascota_id" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                
                <div class="form-group">
                  <label for="conceptoCirugia">Concepto de Cirugia: </label>
                  <input type="text"
                    class="form-control" name="conceptoCirugia" id="conceptoCirugia" aria-describedby="helpId" placeholder="">
                </div>
  
                
                <div class="form-group d-none">
                    <label for="end">Fin</label>
                    <input type="date"
                      class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                  </div>

                <div class="form-group">
                  <label for="start">Fecha de Cirugia: </label>
                  <input type="text"
                    class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                </div>
  
                <div class="form-group">
                  <label for="recomendacionPreoOperatoria">Recomendacion Preoperatorio: </label>
                  <input type="text"
                    class="form-control" name="recomendacionPreoOperatoria" id="recomendacionPreoOperatoria" aria-describedby="helpId" placeholder="">
                </div>

            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
               <!-- <button type="button" class="btn btn-primary">Modificar</button>
                <button type="button" class="btn btn-primary">Eliminar</button> -->
            
            </div>
        </div>
    </div>
  </div>