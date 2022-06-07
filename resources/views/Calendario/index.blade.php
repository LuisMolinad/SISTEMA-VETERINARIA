@extends('app')
@section('content')
    
<div class="container">
    <!--Por medio de esta instruccion aparece la agenda-->
    <div id="agenda">
        Agenda
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
  Launch
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <!--Coloco los campos de llenado -->

                <form action=""> <!-- Se declara esta accion para poder capturar los datos del formulario -->
                  {!! csrf_field() !!} <!--Captura los formularios unicamente del formulario-->
                  <div class="form-group">

                 

                    <div class="form-group">
                      <label for="id">ID</label>
                      <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>


                  <label for="title">Titulo</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Escribe el titulo del evento" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <label for="start">Inicio</label>
                  <input type="date"
                    class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <div class="form-group">
                  <label for="end">Fin</label>
                  <input type="date"
                    class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnguardar">Guardar</button>
               <!-- <button type="button" class="btn btn-primary">Modificar</button>
                <button type="button" class="btn btn-primary">Eliminar</button> -->
            
            </div>
        </div>
    </div>
</div>

@endsection