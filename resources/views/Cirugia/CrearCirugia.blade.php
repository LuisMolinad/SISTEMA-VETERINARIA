@extends('app')

@section('titulo')
Cita de cirugía
@endsection

@section('header')
<br>
<div class="container">
    <h1>Cita de cirugía</h1>
</div>
@endsection

@section('content')
<div class="container">
    <form action="{{url('/citacirugia')}}" method="post">
        @csrf
        <br>
        <center> <h5>Datos generales de la mascota</h5> </center>   
        <br>
        <div class="form-row" > 
                <div class="form-group col-md-6">
                
                <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
                    <input type="text" class="form-control" id="IDMASCOTA" value = "{{$mascotas->idMascota}}" readonly="readonly">
            
                    <strong> <label for="inputRazaMascota">RAZA</label></strong>
                    <input type="text" class="form-control" id="inputRazaMascota" value="{{$mascotas->razaMascota}}" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong>  <label for="inputNombreMascota">Mascota</label></strong>
                    <input type="text" class="form-control" id="inputNombreMascota" name = "title" value="{{$mascotas->nombreMascota}}" readonly="readonly">


                    <strong>  <label for="inputSexoMascota" >Sexo</label></strong>
                    <input type="text" class="form-control" id="inputSexoMascota" value="{{$mascotas->sexoMascota}}" style="width: 180px;" readonly="readonly">
                </div>
                <div class="invisible">
                    <strong> <label for="IDMASCOTA">ID</label></strong>
                    <input type="text" class="form-control" id="IDMASCOTA" name="mascota_id" value = "{{$mascotas->id}}" readonly="readonly">
                </div>
            </div>


            <br>
            <center> <h5>Datos generales del dueño</h5> </center>   
            <br>
            <div class="form-row" style="background-color:#e1dff4">
                <div class="form-group col-md-6">
                    <strong> <label for="inputnombreDuenio"style="color:black">Dueño</label> </strong>
                <input type="text" class="form-control" id="inputnombreDuenio" value="{{$mascotas->propietario->nombrePropietario }}" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong>  <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
                <input type="text" class="form-control" id="inputContactNumber" value="{{$mascotas->propietario->telefonoPropietario}}" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong>   <label for="inputDireccion" style="color:black">Dirección</label></strong>
                    <input type="text" class="form-control" id="inputDireccion"  value="{{$mascotas->propietario->direccionPropietario}}" readonly="readonly">
                </div>
            </div>


            <br>
            <center> <h5>Fecha de cirugía</h5> </center>   
            <br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong>   <label for="inputConceptoCirugia" style="color:black">Concepto de cirugía</label></strong>
                    <input type="text" class="form-control" id="inputConceptoCirugia" name="conceptoCirugia" placeholder="Motivo de la cirugía" required>
                
                </div>
            
                <div class="form-group col-md-6">
                    <strong>   <label for="inputFechaCirugia" style="color:black">Fecha de cirugía</label></strong>
                    <input class="form-control" type="datetime-local" name="start" id="fechaHoraCitaCirugia" required>

                </div>
                <div class="form-group col-md-6">
                    <strong>   <label for="inputRecomendacionesPre" style="color:black">Recomendaciones preoperatorias</label></strong>
                    <input type="text" class="form-control" id="inputRecomendacionesPre" name="recomendacionPreoOperatoria"placeholder="Recomendaciones preoperatorias" required>
                
                </div>
                <div class="invisible">
                    <strong> <label for="END">End</label></strong>
                    <input type="text" class="form-control" id="END" name="end" readonly="readonly">
                </div>
            </div>    

            <br>
        
        
            <!--<br>
            <center> <h5>Recordatorio de cirugía</h5> </center>   
            <br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong>   <label for="inputMensajeRecordatorio" style="color:black">Mensaje de recordatorio</label></strong>
                    <input type="text" class="form-control" id="inputMensajeRecordatorio" placeholder="Mensaje de recordatorio">
                
                </div>
            
                <div class="form-group col-md-6">
                    <strong>   <label for="inputFechaRecordatorio" style="color:black">Fecha de recordatorio de cirugía</label></strong>
                    <input class="form-control" type="datetime-local" name="fechaRecordatorio" id="FechaRecordatorio" >

                    
                </div>
            
            </div>   --> 
            
            <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>
        
        <a href="{{ route('Cirugia.pdf') }}"  class="btn btn-primary btn-sm" data-placement= "left">{{__('Acta de permiso')}}  
        </a>  
    </form>
</div>
@endsection
