@extends('app')

@section('titulo')
RECORD VACUNACION - {{'NOMBRE'}}
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- Llamamos al sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Llamamos nuestro documento de sweetalert -->
<script src="{{asset('js/eliminar_sweetalert2.js')}}"></script>

<link rel="stylesheet" href="{{ asset('css/Expediente/record.css') }}">
@endsection

@section('header')
<h1 class="header">RECORD VACUNACION - {{'NOMBRE'}}</h1>
@endsection

@section('content')
<div class="container">
    @include('layouts.notificacion')
    <div class="record-informacion_general">
        <table>
            <tbody>
                <tr>
                    <td><strong>Dueño:</strong></td>
                    <td>{{'Nombre del duenio'}}</td>
                    <td></td>
                    <td><strong>{{'Numero de la mascota'}}</strong></td>
                </tr>
                <tr>
                    <td><strong>Sexo:</strong></td>
                    <td>{{'Sexo'}}</td>
                    <td><strong>Telefono:</strong></td>
                    <td>{{'Telefono'}}</td>
                </tr>
                <tr>
                    <td><strong>Mascota</strong></td>
                    <td>{{'Nombre mascota'}}</td>
                    <td><strong>Fecha nacimiento:</strong></td>
                    <td>{{'Fecha nacimiento'}}</td>
                </tr>
                <tr>
                    <td><strong>Raza:</strong></td>
                    <td>{{'Raza'}}</td>
                    <td><strong>Color:</strong></td>
                    <td>{{'Color'}}</td>
                </tr>
                <tr>
                    <td><strong>Direccion:</strong></td>
                    <td>{{'Direccion'}}</td>
                    <td><strong>Especie:</strong></td>
                    <td>{{'Especie'}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <div class="record-botones_crud">
        <button class="btn btn-success">Agregar record de vacunacion</button>
        <button class="btn btn-info">Cartilla de vacunacion</button>
    </div>

    <br>
    <div class="record-tablas">
        <div class="record-card">
            <h4>{{'Vacuna'}}</h4>
            <table>
                <thead>
                    <th>Fecha</th>
                    <th>Peso</th>
                    <th>Refuerzo</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="record-card">
            <h4>{{'Vacuna'}}</h4>
            <table>
                <thead>
                    <th>Fecha</th>
                    <th>Peso</th>
                    <th>Refuerzo</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="record-card">
            <h4>{{'Vacuna'}}</h4>
            <table>
                <thead>
                    <th>Fecha</th>
                    <th>Peso</th>
                    <th>Refuerzo</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="record-card">
            <h4>{{'Vacuna'}}</h4>
            <table>
                <thead>
                    <th>Fecha</th>
                    <th>Peso</th>
                    <th>Refuerzo</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="record-card">
            <h4>{{'Vacuna'}}</h4>
            <table>
                <thead>
                    <th>Fecha</th>
                    <th>Peso</th>
                    <th>Refuerzo</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                    <tr>
                        <td>24-05-2000</td>
                        <td>9.6lbs.</td>
                        <td>15-01-26</td>
                        <td><button class="btn btn-danger"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection