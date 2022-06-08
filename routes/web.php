<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\defuncionController;
use App\Http\Controllers\CitaVacunaController;
use App\Http\Controllers\CitaCirugiaController;

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
//Route::get('/listaCirugia', function () {
  //  return view('Cirugia.GestionarCirugia');
//});
//Route::get('/crearCita', function () {
//    return view('Cirugia.CrearCirugia');
//});
Route::get('/GestionarCirugia', [CitaCirugiaController::class, 'index'])->name('Cirugia.index');
Route::get('/crearCita', [CitaCirugiaController::class, 'create'])->name('Cirugia.create');

/*------------------------------------- PDF ---------------------------------------------------------------------------- */

/* Route::get('/crearCita/pdf', function () {
    return view('welcome');
}); */

Route::get('crearCita/CirugiaPDF', [CitaCirugiaController::class, 'pdf'])->name('Cirugia.pdf');



/*------------------------------------- Citas Vacunas---------------------------------------------------------------------------- */

Route::get('citas/listaMascotas', [CitaVacunaController::class, 'index'])->name('citaVacuna.index');
Route::get('citas/nuevaDosis', [CitaVacunaController::class, 'create'])->name('citaVacuna.create');


/*------------------------------------- RUTEO A SECCION ACTAS------------------------------------------------------- */
//Acta de defuncion Controller

Route::get('actas/listadefuncion', [defuncionController::class, 'index'])->name('defuncion.index');
Route::get('actas/defuncion', [defuncionController::class, 'create'])->name('defuncion.create');

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
Route::get('/', [App\Http\Controllers\CitaServicioController::class, 'index']);
//Almacenar datos por medio de Store
Route::post('/agregar', [App\Http\Controllers\CitaServicioController::class, 'store']);
//Obtengo los datos para pintarlos en el calendario
Route::get('/mostrar', [App\Http\Controllers\CitaServicioController::class, 'show']);
//Al momento de dar click a un evento del calendario se mostrara su contenido
Route::post('/editar/{id}', [App\Http\Controllers\CitaServicioController::class, 'edit']);
