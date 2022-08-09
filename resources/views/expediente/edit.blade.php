@extends('app')

@section('titulo')
EDITAR EXPEDIENTE
@endsection


@section('header')
    <h1 class="header">EDITAR EXPEDIENTE</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/expediente/'.$expediente->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <fieldset class="fieldset">
            <legend class="legend">Expediente</legend>
                <div class="form-group none">
                    <label for="mascota_id">Codigo mascota</label>
                    <input value="{{$expediente->mascota_id}}" type="text" maxlength="15" class="form-control" id="mascota_id" name="mascota_id" placeholder="Codigo de la mascota" readonly>
                </div>

                <div class="form-group">
                    <label for="causaFallecimiento">Causa de fallecimiento</label>
                    <input value="{{$expediente->causaFallecimiento}}" type="text" maxlength="30" class="form-control" id="causaFallecimiento" name="causaFallecimiento" placeholder="Causa de fallecimiento de la mascota">
                </div>

                <div class="form-group">
                    <label for="fallecidoExpediente">Estado del animal</label>
                    <select class="form-control" id="fallecidoExpediente" name="fallecidoExpediente">
                        <option <?php if($expediente->fallecidoExpediente == 'Fallecido'){ echo 'selected'; } ?> >Fallecido</option>
                        <option <?php if($expediente->fallecidoExpediente == 'Vivo'){ echo 'selected'; } ?> >Vivo</option>
                    </select>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Editar expediente</button>
        </form>
    </div>

@endsection