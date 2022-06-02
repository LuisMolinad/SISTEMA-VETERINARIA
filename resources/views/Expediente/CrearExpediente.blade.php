@extends('app')

@section('titulo')
Crear expediente
@endsection

@section('content')

<header>
    <h1>CREAR EXPEDIENTE MASCOTA</h1>
</header>

<main>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Codigo de la mascota</label>
                <input type="text" class="form-control" id="inputCodigoMascota" placeholder="Ingrese el codigo de la mascosta">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la mascota</label>
                <input type="text" class="form-control" id="inputNombreMascota" placeholder="Ingrese el nombre de la mascosta">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Raza</label>
                <input type="text" class="form-control" id="inputRazaMascota" placeholder="Ingrese la raza de la mascosta">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Color</label>
                <input type="text" class="form-control" id="inputColorMascota" placeholder="Ingrese el color de la mascosta">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Sexo</label>
                <select class="form-control" id="inputSexoMascota">
                    <option>Seleccionar sexo</option>
                    <option>Hembra</option>
                    <option>Varon</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Especie</label>
                <select class="form-control" id="inputSexoMascota">
                    <option>Seleccionar especie</option>
                    <option>Perro</option>
                    <option>Gato</option>
                    <option>Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del dueño</label>
                <input type="text" class="form-control" id="inputDueñoMascota" placeholder="Ingrese el nombre del dueño de la mascosta">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Numero de telefono</label>
                <input type="text" class="form-control" id="inputTelefonoMascota" placeholder="Ingrese el nunmero de telefono del dueño de la mascosta">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Direccion</label>
                <input type="text" class="form-control" id="inputDireccionMascota" placeholder="Ingrese la direccion del dueño de la mascosta">
            </div>
            <button type="submit" class="btn btn-success mb-2">Crear</button>
        </form>
    </div>
</main>

@endsection