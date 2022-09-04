@extends('app')

@section('titulo')
Historial Medico
@endsection

@section('header')
    <h1 class="header">Historial de la Mascota {{$expediente->mascota->nombreMascota}} - ID Mascota: {{$expediente->mascota->idMascota}}</h1>
@endsection
