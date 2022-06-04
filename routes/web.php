<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\defuncionController;

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
//Acta de defuncion Controller
Route::get('actas/defuncion', [defuncionController::class, 'index'])->name('defuncion.index');



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
Auth::routes();
/*Accede al metodo index del Evento Controller*/
Route::get('/', [App\Http\Controllers\EventoController::class, 'index']);


