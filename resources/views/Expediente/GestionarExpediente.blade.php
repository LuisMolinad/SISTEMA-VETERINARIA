@extends('app')

@section('titulo')
Gestionar Expediente
@endsection

@section('header')
<div class="container">
    <div class="row">
        <div class="column">
            <h1>GESTIONAR EXPEDIENTE</h1>
        </div>
        <div class="column">
            <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="column">
            <a href="/crear_expediente"><button class="btn btn-success">Crear Expediente</button></a>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
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
                    <th scope="id">ROA2405</th>
                    <td>Centavo</td>
                    <td>Rosalio</td>
                    <td>78546932</td>
                    <td>Cantón Santa Lucia</td>
                    <td>
                        <button type="button" class="btn btn-warning">Editar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <th scope="id">ROA2405</th>
                    <td>Centavo</td>
                    <td>Rosalio</td>
                    <td>78546932</td>
                    <td>Cantón Santa Lucia</td>
                    <td>
                        <button type="button" class="btn btn-warning">Editar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <th scope="id">ROA2405</th>
                    <td>Centavo</td>
                    <td>Rosalio</td>
                    <td>78546932</td>
                    <td>Cantón Santa Lucia</td>
                    <td>
                        <button type="button" class="btn btn-warning">Editar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection