@extends('app')

@section('titulo')
Agenda Veterinaria
@endsection

@section('content')

<div class="container">
    <!--Por medio de esta instruccion aparece la agenda-->
    <div id="agenda">
    </div>
</div>

<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
  Launch
</button>-->

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agendar Cita de Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <!--Coloco los campos de llenado -->

                <form action="" id="agregarcitasservicios" name="agregarcitasservicios"> <!-- Se declara esta accion para poder capturar los datos del formulario -->
                  <div id="validaragendar"></div>
                  {!! csrf_field() !!} <!--Captura los formularios unicamente del formulario-->
                  <div class="form-group">

                    <div class="form-group d-none">
                      <label for="id">ID</label>
                      <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                    </div>

                  <label for="title">Nombre de Mascota: </label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese el nombre de la mascota" aria-describedby="helpId">
                </div>

                <div class="form-group">
                  <label for="horaServicio">Hora: </label>
                  <input type="time"
                    class="form-control" name="horaServicio" id="horaServicio" aria-describedby="helpId" placeholder="Ingrese el color de la mascota">
                </div>

                <div class="form-group">
                  <label for="start">Fecha: </label>
                  <input type="text"
                    class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="" readonly>
                </div>

                <div class="form-group">
                  <label for="tipoServicio_id">Tipo de Servicio: </label>
                  <select class="form-control" name="tipoServicio_id" id="tipoServicio_id">
                    @foreach ($tipoServicios as $tipoServicio)
                      <option value="{{$tipoServicio->id}}">{{$tipoServicio->nombreServicio}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="clienteServicio">Propietario: </label>
                  <input type="text"
                    class="form-control" name="clienteServicio" id="clienteServicio" aria-describedby="helpId" placeholder="Ingrese el nombre del propietario">
                </div>

                <div class="form-group">
                  <label for="telefonoServicio">Telefono: </label>
                  <input type="text"
                    class="form-control" name="telefonoServicio" id="telefonoServicio" aria-describedby="helpId" placeholder="Ingrese el telefono del propietario">
                </div>

                <div class="form-group">
                  <label for="descripcion">Observaciones: </label>
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                </div>

                <div class="form-group d-none">
                  <label for="color">Color</label>
                  <input type="text"
                    class="form-control" name="color" id="color" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group d-none">
                  <label for="end">Fin</label>
                  <input type="date"
                    class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                </div>

                  <div class="form-group d-none">
                  <label for="groupId"></label>
                  <input type="text"
                    class="form-control" name="groupId" id="groupId" aria-describedby="helpId" value="citasServicios">
                </div>

            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnguardar">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal unicamente para mostrar informacion, este se actualizara para el editar/borrar-->
<div class="modal fade" id="eventoconsulta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Datos Cita</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
          <div class="modal-body">
              <!--Coloco los campos de llenado -->

              <form action="" id="operacionesservicio"> <!-- Se declara esta accion para poder capturar los datos del formulario -->
                {!! csrf_field() !!} <!--Captura los formularios unicamente del formulario-->
                <div class="form-group">

                  <div class="form-group d-none">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                  </div>

                <label for="title">Nombre de Mascota</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese el nombre de la mascota" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="horaServicio">Hora</label>
                <input type="time"
                  class="form-control" name="horaServicio" id="horaServicio" aria-describedby="helpId" placeholder="Ingrese el color de la mascota">
              </div>

              <div class="form-group">
                <label for="start">Fecha</label>
                <input type="text"
                  class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
              </div>

              <div class="form-group">
                <label for="tipoServicio_id">Servicio a Realizar</label>
                <input type="text"
                  class="form-control" name="tipoServicio_id" id="tipoServicio_id" aria-describedby="helpId" placeholder="">
              </div>

              <div class="form-group">
                <label for="clienteServicio">Propietario</label>
                <input type="text"
                  class="form-control" name="clienteServicio" id="clienteServicio" aria-describedby="helpId" placeholder="Ingrese el nombre del propietario">
              </div>

              <div class="form-group">
                <label for="telefonoServicio">Telefono</label>
                <input type="text"
                  class="form-control" name="telefonoServicio" id="telefonoServicio" aria-describedby="helpId" placeholder="Ingrese el telefono del propietario">
              </div>

              <div class="form-group">
                <label for="descripcion">Observaciones</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
              </div>

              <div class="form-group d-none">
                <label for="end">Fin</label>
                <input type="date"
                  class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
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
@extends('Calendario/modalCitasVacunas')
@extends('Calendario/modalCitasCirugia')


@endsection
