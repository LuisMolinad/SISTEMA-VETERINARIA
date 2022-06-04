<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\defuncionController;
use App\Http\Controllers\CitaVacunaController;


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
/*------------------------------------- RUTEO A SECCION expediente------------------------------------------------------- */
Route::get('/gestionar_expediente', function () {
    return view('Expediente.GestionarExpediente');
});

Route::get('/crear_expediente', function () {
    return view('Expediente.CrearExpediente');
});

Route::get('/editar_expediente', function () {
    return view('Expediente.EditarExpediente');
});
/*------------------------------------- RUTEO A SECCION CITAS------------------------------------------------------- */
/*-------------------------------------CITAS CIRUGIA ---------------------------------------------------------------------------- */
Route::get('/gestionar_cirugia', function () {
    return view('Cirugia.GestionarCirugia');
});
Route::get('/crear_cirugia', function () {
    return view('Cirugia.CrearCirugia');
});


/*------------------------------------- Citas Vacunas---------------------------------------------------------------------------- */

Route::get('citas/listaMascotas', [CitaVacunaController::class, 'index'])->name('citaVacuna.index');
Route::get('citas/nuevaDosis', [CitaVacunaController::class, 'create'])->name('citaVacuna.create');


/*------------------------------------- RUTEO A SECCION ACTAS------------------------------------------------------- */
//Acta de defuncion Controller

Route::get('actas/listadefuncion', [defuncionController::class, 'index'])->name('defuncion.index');
Route::get('actas/defuncion', [defuncionController::class, 'create'])->name('defuncion.create');





Auth::routes();
/*Accede al metodo index del Evento Controller*/
Route::get('/', [App\Http\Controllers\EventoController::class, 'index']);


