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
            <label for="IDMASCOTA">IDMASCOTA</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="IDMASCOTA">
          </div>
          <div class="form-group">
            <label for="inputNombreMascota">Mascota</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Nombre Mascota">
          </div>
          <div class="form-row" style="background-color:#d3e9ff">
            <div class="form-group col-md-6">
              <label for="inputnombreDuenio">Dueño</label>
              <input type="text" class="form-control" id="inputnombreDuenio" placeholder="Nombre del dueño">
            </div>
            <div class="form-group col-md-6">
              <label for="inputContactNumber">Número de contacto</label>
              <input type="text" class="form-control" id="inputContactNumber" placeholder="Número de contacto">
            </div>
            <div class="form-group col-md-6">
                <label for="inputDireccion">Direccion</label>
                <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion del dueño">
              </div>
          </div>
        <div class="form-group">
            <label for="InputCausaFallecimiento">Causa del fallecimiento</label>
            <input type="text" class="form-control" style="width: 550px; height: 120px;" id="InputCausaFallecimiento" placeholder="Causa del fallecimiento">
        </div>


        <button type="submit"  class="btn btn-primary">Guardar</button>
      </form>
</div>
@endsection
