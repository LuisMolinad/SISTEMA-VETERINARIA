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
                <input type="text" class="form-control" id="inputAddress" value="{{ $mascotas->idMascota }}"
                    placeholder="IDMASCOTA" readonly="readonly">
            </div>
            <div class="form-group">
                <strong> <label for="inputNombreMascota">Mascota</label></strong>
                <input type="text" class="form-control" id="inputAddress2" value="{{ $mascotas->nombreMascota }}"
                    readonly="readonly">
            </div>
            <div class="form-row" style="background-color:#e1dff4">
                <div class="form-group col-md-6">
                    <strong> <label for="inputnombreDuenio"style="color:black">Dueño</label> </strong>
                    <input type="text" class="form-control" value="{{ $mascotas->propietario->nombrePropietario }}"
                        id="inputnombreDuenio" placeholder="Nombre del dueño" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
                    <input type="text" class="form-control" id="inputContactNumber" placeholder="Número de contacto"
                        value="{{ $mascotas->propietario->telefonoPropietario }}" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="inputDireccion" style="color:black">Direccion</label></strong>
                    <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion del dueño"
                        value="{{ $mascotas->propietario->direccionPropietario }}" readonly="readonly">
                </div>
            </div>
            <br>
            @can('crear-ActasDefuncion')
                <div class="form-group">
                    <a href="{{ url('/imprimir/' . $mascotas->id) }}" class="btn btn-primary">{{ __('Imprimir') }}</a>
                </div>
            @endcan
    </div>
    </form>
    </div>
@endsection
