@extends('app')

@section('titulo')
Cita de vacunación
@endsection

@section('header')
<br>
<div class="container">
    <h1>Cita Vacunación</h1>
</div>
@endsection

@section('content')
<div class="container">
    <form>
        <div class="form-row" >
            <div class="form-group col-md-6">
                <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
                <input type="text" class="form-control" id="IDMASCOTA" placeholder="IDMASCOTA">
            </div>
            <div class="form-group col-md-6">
                <strong>  <label for="inputNombreMascota">Mascota</label></strong>
                <input type="text" class="form-control" id="inputNombreMascota" placeholder="Nombre Mascota">


                <strong>  <label for="inputPesoMascota" >Peso</label></strong>
                <input type="text" class="form-control" id="inputPesoMascota" style="width: 100px;"placeholder="lb">
            </div>
        </div>
          <div class="form-row" style="background-color:#e1dff4">
            <div class="form-group col-md-6">
                <strong> <label for="inputnombreDuenio"style="color:black">Dueño</label> </strong>
              <input type="text" class="form-control" id="inputnombreDuenio" placeholder="Nombre del dueño">
            </div>
            <div class="form-group col-md-6">
                <strong>  <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
              <input type="text" class="form-control" id="inputContactNumber" placeholder="Número de contacto">
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="inputDireccion" style="color:black">Direccion</label></strong>
                <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion del dueño">
              </div>
          </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <strong>   <label for="inputDireccion" style="color:black">Vacuna</label></strong>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Vacunas</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                      <option selected>Selecciona una vacuna...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="inputFechaAplicacion" style="color:black">Fecha aplicación</label></strong>
                <input class="date form-control" type="text" id="inputFechaAplicacion" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="inputFechaAplicacion" style="color:black">Fecha refuerzo</label></strong>
                <input class="date form-control" type="text" id="inputFechaAplicacion" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="inputFechaAplicacion" style="color:black">Fecha recordatorio</label></strong>
                <input class="date form-control" type="text" id="inputFechaAplicacion" readonly="readonly">
            </div>
        </div>
        <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>
      </form>
</div>
@endsection
