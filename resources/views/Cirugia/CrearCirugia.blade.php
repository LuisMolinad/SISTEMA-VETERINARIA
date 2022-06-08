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
    <form>
    <br>
    <center> <h5>Datos generales de la mascota</h5> </center>   
    <br>
    <div class="form-row" >
            <div class="form-group col-md-6">
            <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
                <input type="text" class="form-control" id="IDMASCOTA" placeholder="IDMASCOTA">
           
                <strong> <label for="inputRazaMascota">RAZA</label></strong>
                <input type="text" class="form-control" id="inputRazaMascota" placeholder="Raza">
            </div>
            <div class="form-group col-md-6">
                <strong>  <label for="inputNombreMascota">Mascota</label></strong>
                <input type="text" class="form-control" id="inputNombreMascota" placeholder="Nombre Mascota">


                <strong>  <label for="inputSexoMascota" >Sexo</label></strong>
                <input type="text" class="form-control" id="inputSexoMascota" style="width: 180px;"placeholder="Sexo mascota">
            </div>
        </div>


        <br>
        <center> <h5>Datos generales del dueño</h5> </center>   
        <br>
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
                <strong>   <label for="inputDireccion" style="color:black">Dirección</label></strong>
                <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección del dueño">
              </div>
          </div>


        <br>
        <center> <h5>Fecha de cirugía</h5> </center>   
        <br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <strong>   <label for="inputConceptoCirugia" style="color:black">Concepto de cirugía</label></strong>
                <input type="text" class="form-control" id="inputConceptoCirugia" placeholder="Motivo de la cirugía">
              
            </div>
           
            <div class="form-group col-md-6">
                <strong>   <label for="inputFechaCirugia" style="color:black">Fecha de cirugía</label></strong>
                <input class="date form-control" type="text" id="inputFechaCirugia" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
                <strong>   <label for="inputRecomendacionesPre" style="color:black">Recomendaciones preoperatorias</label></strong>
                <input type="text" class="form-control" id="inputRecomendacionesPre" placeholder="Recomendaciones preoperatorias">
              
            </div>
        
         </div>    

         <br>
      
      
         <br>
        <center> <h5>Recordatorio de cirugía</h5> </center>   
        <br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <strong>   <label for="inputMensajeRecordatorio" style="color:black">Mensaje de recordatorio</label></strong>
                <input type="text" class="form-control" id="inputMensajeRecordatorio" placeholder="Mensaje de recordatorio">
              
            </div>
           
            <div class="form-group col-md-6">
                <strong>   <label for="inputFechaRecordatorio" style="color:black">Fecha de recordatorio de cirugía</label></strong>
                <input class="date form-control" type="text" id="inputFechaRecordatorio" readonly="readonly">
            </div>
        
         </div>    
         
          <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>
      
 <a href="{{ route('Cirugia.pdf') }}"  class="btn btn-primary btn-sm" data-placement= "left">{{__('Acta de permiso')}}  
</a>  
</form>
</div>
@endsection
