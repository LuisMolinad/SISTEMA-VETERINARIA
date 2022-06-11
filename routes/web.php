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


Route::get('citas/index', [CitaVacunaController::class, 'index'])->name('citaVacuna.index');
//Route::resource('/citasvacuna', CitaVacunaController::class);
Route::get('/crearCitaVacuna/{id}', [CitaVacunaController::class, 'mostrar'])->name('Cirugia.mostrar');
Route::post('/guardarCitaVacuna', [CitaVacunaController::class, 'store'])->name('Cirugia.store');




/*------------------------------------- RUTEO A SECCION ACTAS------------------------------------------------------- */
//Acta de defuncion Controller

Route::get('actas/listadefuncion', [defuncionController::class, 'index'])->name('defuncion.index');
Route::get('crear/actas/{id}', [defuncionController::class, 'mostrar'])->name('defuncion.mostrar');
Route::get('/imprimir/{id}', [defuncionController::class, 'pdf'])->name('Acta.pdf');





/*Accede al metodo index del Evento Controller*/
Route::get('/', [App\Http\Controllers\CitaServicioController::class, 'index']);
//Almacenar datos por medio de Store
Route::post('/agregar', [App\Http\Controllers\CitaServicioController::class, 'store']);
//Obtengo los datos para pintarlos en el calendario
Route::get('/mostrar', [App\Http\Controllers\CitaServicioController::class, 'show']);
//Al momento de dar click a un evento del calendario se mostrara su contenido
Route::post('/editar/{id}', [App\Http\Controllers\CitaServicioController::class, 'edit']);
Route::get('/tipoServicios/{id}', [App\Http\Controllers\TipoServicioController::class, 'showId']);


/*---------------Propietario---------------*/
Route::resource('propietario', PropietarioController::class);
/*---------------Mascota---------------*/
Route::resource('mascota', MascotaController::class);
/*---------------Expediente---------------*/
Route::resource('expediente', ExpedienteController::class);

Route::get('expediente/pdf/{expediente}', [\App\Http\Controllers\ExpedienteController::class, 'pdf']);
Route::get('/exped/{id}', [ExpedienteController::class, 'pdfConverter']);

Route::resource('vacuna',VacunaController::class);
Route::resource('tiposervicio',TipoServicioController::class);

/*Mostrar citas vacunas*/
Route::get('/mostrarvacunas', [App\Http\Controllers\CitaVacunaController::class, 'show']);
//Obtengo los datos para pintarlos en el calendario de citas vacunas
Route::get('/editarCitaVacuna/{id}', [App\Http\Controllers\CitaVacunaController::class, 'edit']);
Route::get('/vacunas/{id}', [App\Http\Controllers\VacunaController::class, 'showId']);

/*Mostrar citas cirugias*/
Route::get('/mostrarcirugias', [App\Http\Controllers\CitaCirugiaController::class, 'show']);
Route::get('/editarCitaCirugia/{id}', [App\Http\Controllers\CitaCirugiaController::class, 'edit']);