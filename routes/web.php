<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
    return view('Calendario.index');
});
*/

Route::get('/app', function () {
    return view('app');
});

Route::get('/gestionar_expediente', function () {
    return view('Expediente.GestionarExpediente');
});

Route::get('/crear_expediente', function () {
    return view('Expediente.CrearExpediente');
});

Route::get('/editar_expediente', function () {
    return view('Expediente.EditarExpediente');
});

Route::get('/gestionar_cirugia', function () {
    return view('Cirugia.GestionarCirugia');
});
Route::get('/crear_cirugia', function () {
    return view('Cirugia.CrearCirugia');
});
Route::get('/gestionar_servicios', function () {
    return view('Recursos.Servicio.GestionarServicio');
});
Route::get('/gestionar_servicios/agregar_servicio',function(){
    return view('Recursos.Servicio.AgregarServicio');
});
Route::get('/gestionar_vacunas', function () {
    return view('Recursos.Vacuna.GestionarVacuna');
});
Route::get('/gestionar_vacunas/agregar_vacuna', function () {
    return view('Recursos.Vacuna.AgregarVacuna');
});
Auth::routes();
/*Accede al metodo index del Evento Controller*/
Route::get('/', [App\Http\Controllers\EventoController::class, 'index']);