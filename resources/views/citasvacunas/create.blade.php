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
    <form action="{{ url('/guardarCitaVacuna')  }}"  method="POST">
        @csrf
        <div class="form-row" >
            <div class="form-group col-md-6">
                <strong>  <label for="mascota_id"> IDMASCOTA</label></strong>
                <input type="text" class="form-control" id="idVisible"  name="idVisible" value = "{{$mascotas->idMascota}}" readonly="readonly">
                <input  class="form-control" id="mascota_id"  name="mascota_id" value = "{{$mascotas->id}}" type="hidden" readonly="readonly">
                <input  class="form-control" id="title"  name="title" value = "{{$mascotas->nombreMascota}}"  type="hidden" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
                <strong>  <label for="pesolb" >Peso</label></strong>
                <input type="number" class="form-control" id="pesolb"   name="pesolb"style="width: 100px;"placeholder="lb">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <strong>   <label for="inputDireccion" style="color:black">Vacuna</label></strong>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="vacuna_id">Vacunas</label>
                    </div>
                    <select class="custom-select" id="vacuna_id" name='vacuna_id'>
                        @foreach ($vacunas as $vacuna)
                        <option value="{{$vacuna->id}}">{{$vacuna->nombreVacuna}}</option>
                    @endforeach
                    </select>
                  </div>
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="end" style="color:black">Fecha aplicación</label></strong>
                <input class="form-control" type="datetime-local" name="end" id="end">
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="start" style="color:black">Fecha refuerzo</label></strong>
                <input class="form-control" type="datetime-local" name="start" id="start" >
            </div>
        </div>
        <!--<button type="submit" href="{{ url('/guardarCitaVacuna/'.$mascotas->id) }}" style="float: right; width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>-->
        <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
