@extends('app')

@section('titulo')
Actas de defunción
@endsection

@section('header')
<br>
<div class="container">
    <h1>Acta defunción</h1>
</div>
@endsection

@section('content')
<div class="container">
    <form>
        <div class="form-group">
            <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
            <input type="text" class="form-control" id="inputAddress" value = "{{$mascotas->idMascota}}" placeholder="IDMASCOTA" readonly="readonly">
          </div>
          <div class="form-group">
            <strong>  <label for="inputNombreMascota">Mascota</label></strong>
            <input type="text" class="form-control" id="inputAddress2" value = "{{$mascotas->nombreMascota}}" readonly="readonly">
          </div>
          <div class="form-row" style="background-color:#e1dff4">
            <div class="form-group col-md-6">
                <strong> <label for="inputnombreDuenio"style="color:black">Dueño</label> </strong>
              <input type="text" class="form-control" value = "{{$mascotas->propietario->nombrePropietario }}"id="inputnombreDuenio" placeholder="Nombre del dueño"  readonly="readonly">
            </div>
            <div class="form-group col-md-6">
                <strong>  <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
              <input type="text" class="form-control" id="inputContactNumber" placeholder="Número de contacto" value = "{{$mascotas->propietario->telefonoPropietario }}" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="inputDireccion" style="color:black">Direccion</label></strong>
                <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion del dueño" value = "{{$mascotas->propietario->direccionPropietario }}" readonly="readonly">
              </div>
          </div>
        <div class="form-group">
            <strong> <label for="InputCausaFallecimiento">Causa del fallecimiento</label> </strong>
            <input type="text" class="form-control" style="width: 550px; height: 120px;" id="InputCausaFallecimiento" placeholder="Causa del fallecimiento">
        </div>


        <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>
      </form>
</div>
@endsection
