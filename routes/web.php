<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\defuncionController;
use App\Http\Controllers\CitaVacunaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\CitaCirugiaController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\TipoServicioController;

/****

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
Auth::routes();

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
/*
Route::get('/GestionarCirugia', [CitaCirugiaController::class, 'index'])->name('Cirugia.index');
Route::get('/crearCita', [CitaCirugiaController::class, 'create'])->name('Cirugia.create');
*/
Route::resource('citacirugia', CitaCirugiaController::class );
Route::get('/crearCita/{id}', [CitaCirugiaController::class, 'mostrar'])->name('Cirugia.mostrar');
//Route::resource('expediente', ExpedienteController::class);
/*------------------------------------- PDF ---------------------------------------------------------------------------- */


Route::get('/CirugiaPDF', [CitaCirugiaController::class, 'pdf'])->name('Cirugia.pdf');



/*------------------------------------- Citas Vacunas---------------------------------------------------------------------------- */
//Route::resource('citaVacuna',CitaVacunaController::class);
/*
Route::get('citas/show', [CitaVacunaController::class, 'show'])->name('citaVacuna.show');

Route::get('citas/create', [CitaVacunaController::class, 'create'])->name('citaVacuna.create');
*/

Route::resource('/citasvacuna', CitaVacunaController::class);






/*------------------------------------- RUTEO A SECCION ACTAS------------------------------------------------------- */
//Acta de defuncion Controller

Route::get('actas/listadefuncion', [defuncionController::class, 'index'])->name('defuncion.index');
Route::get('actas/defuncion', [defuncionController::class, 'create'])->name('defuncion.create');






/*Accede al metodo index del Evento Controller*/
Route::get('/', [App\Http\Controllers\CitaServicioController::class, 'index']);
//Almacenar datos por medio de Store
Route::post('/agregar', [App\Http\Controllers\CitaServicioController::class, 'store']);
//Obtengo los datos para pintarlos en el calendario
Route::get('/mostrar', [App\Http\Controllers\CitaServicioController::class, 'show']);
//Al momento de dar click a un evento del calendario se mostrara su contenido
Route::post('/editar/{id}', [App\Http\Controllers\CitaServicioController::class, 'edit']);


/*---------------Propietario---------------*/
Route::resource('propietario', PropietarioController::class);
/*---------------Mascota---------------*/
Route::resource('mascota', MascotaController::class);
/*---------------Expediente---------------*/
Route::resource('expediente', ExpedienteController::class);

Route::resource('vacuna',VacunaController::class);
Route::resource('tiposervicio',TipoServicioController::class);
