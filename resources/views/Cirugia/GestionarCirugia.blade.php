@extends('app')

@section('titulo')
Citas de cirugías
@endsection

@section('header')

<div class="container">
    <div class="row">
        <div class="column">
        <br>   
            <h2>Gestionar citas de cirugías</h2>
        </div>
        
        <div class="column cl-md-6">
        <br>  
        <br>  
        <br> 
            <form class="d-flex"> 
            <input class="form-control me-2" type="search" placeholder="IDMASCOTA" aria-label="Search" style=" width: 170px; height: 35px;">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <br>
    </div>
</div> 

@endsection

@section('content')
<br>
<div class="container">
    <table class="table">
        <thead style="background-color:#FFEFCF">
            <tr>
            <th scope="col">ID Mascota</th>
            <th scope="col">Nombre</th>
            <th scope="col">Dueño</th>
            <th scope="col">Número</th>
            <th scope="col">Dirección</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="id">G####</th>
                <td>Kero</td>
                <td>Katya</td>
                <td>60014695</td>
                <td>San Bartolo</td>
                <td>
                <a href="/crearCita"><button type="button" class="btn btn-success">Crear</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            <tr>
            <th scope="id">G####</th>
                <td>Luna</td>
                <td>Katya</td>
                <td>60014695</td>
                <td>San Bartolo</td>
                <td>
                    <button type="button" class="btn btn-success">Crear</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            <tr>
                <th scope="id">G####</th>
                <td>Kero</td>
                <td>Katya</td>
                <td>60014695</td>
                <td>San Bartolo</td>
                <td>
                    <button type="button" class="btn btn-success">Crear</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
