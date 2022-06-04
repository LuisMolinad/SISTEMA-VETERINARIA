@extends('app')

@section('titulo')
Gestionar Vacunas
@endsection

@section('header')
<p>
<div class="container">
    <h1>Gestionar vacunas</h1>
    <div class="row">
        <div class="column">
            <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Nombre de vacuna" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <a href="/gestionar_vacunas/agregar_vacuna"><button class="btn btn-success">Nuevo vacuna</button></a>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">N° de vacuna</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Tiempo entre dósis</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>

        </table>
    </div>
@endsection