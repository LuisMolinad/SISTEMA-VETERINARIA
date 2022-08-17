<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\defuncionController;
use App\Http\Controllers\CitaVacunaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\CitaCirugiaController;
use App\Http\Controllers\gestionCitasVacunacionController;
use App\Http\Controllers\CitaLimpiezaDentalController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\TipoServicioController;
use App\Models\mascota;

//Controladores para SPATIE
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Models\citaLimpiezaDental;

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

/* ---------------------------//Rutas de Spatie---------------------------------------------------- */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\CitaServicioController::class, 'index']);
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});


/*------------------------------------- RUTEO A SECCION expediente------------------------------------------------------- */
Route::get('/gestionar_expediente', function () {
    return view('Expediente.GestionarExpediente');
})->middleware('auth');

Route::get('/crear_expediente', function () {
    return view('Expediente.CrearExpediente');
})->middleware('auth');

Route::get('/editar_expediente', function () {
    return view('Expediente.EditarExpediente');
})->middleware('auth');
/*------------------------------------- RUTEO A SECCION CITAS------------------------------------------------------- */
/*-------------------------------------CITAS CIRUGIA ---------------------------------------------------------------------------- */
/*
Route::get('/GestionarCirugia', [CitaCirugiaController::class, 'index'])->name('Cirugia.index');
Route::get('/crearCita', [CitaCirugiaController::class, 'create'])->name('Cirugia.create');
*/
Route::resource('citacirugia', CitaCirugiaController::class)->middleware('auth');
Route::get('/crearCita/{id}', [CitaCirugiaController::class, 'mostrar'])->name('Cirugia.mostrar')->middleware('auth');
Route::post('/guardarCitaVacuna', [CitaCirugiaController::class, 'store'])->name('Cirugia.store')->middleware('auth');
//Route::resource('expediente', ExpedienteController::class);
/*------------------------------------- PDF ---------------------------------------------------------------------------- */


Route::get('CirugiaPDF/{id}', [CitaCirugiaController::class, 'pdf'])->name('Cirugia.pdf')->middleware('auth');



/*------------------------------------- Citas Vacunas---------------------------------------------------------------------------- */



Route::get('citas/index', [CitaVacunaController::class, 'index'])->name('citaVacuna.index')->middleware('auth');
Route::get('/crearCitaVacuna/{id}', [CitaVacunaController::class, 'mostrar'])->name('citaVacuna.mostrar')->middleware('auth');
Route::post('/guardarCitaVacuna', [CitaVacunaController::class, 'store'])->name('Cirugia.store')->middleware('auth');

//Gestionar citas vacunacion
Route::get('/citas/show/gestion/{id}', [gestionCitasVacunacionController::class, 'show'])->name('gestionVacuna.show')->middleware('auth');
//Consulta de cita vacunaciion
Route::get('/citas/index/consulta/{id}/{citaVacuna_id}', [gestionCitasVacunacionController::class, 'index'])->name('gestionVacuna.index')->middleware('auth');
//Editar Cita Vacunacion
Route::get('/citas/edit/{id}', [gestionCitasVacunacionController::class, 'edit'])->name('gestionVacuna.edit')->middleware('auth');




/*------------------------------------- RUTEO A SECCION ACTAS------------------------------------------------------- */
//Acta de defuncion Controller

Route::get('actas/listadefuncion', [defuncionController::class, 'index'])->name('defuncion.index')->middleware('auth');
Route::get('crear/actas/{id}', [defuncionController::class, 'mostrar'])->name('defuncion.mostrar')->middleware('auth');
Route::get('/imprimir/{id}', [defuncionController::class, 'pdf'])->name('Acta.pdf')->middleware('auth');





/*Accede al metodo index del Evento Controller*/
//Route::get('/', [App\Http\Controllers\CitaServicioController::class, 'index']);
//Almacenar datos por medio de Store
Route::post('/agregar', [App\Http\Controllers\CitaServicioController::class, 'store'])->middleware('auth');
//Obtengo los datos para pintarlos en el calendario
Route::get('/mostrar', [App\Http\Controllers\CitaServicioController::class, 'show']);
//Al momento de dar click a un evento del calendario se mostrara su contenido
Route::post('/editar/{id}', [App\Http\Controllers\CitaServicioController::class, 'edit'])->middleware('auth');
Route::get('/tipoServicios/{id}', [App\Http\Controllers\TipoServicioController::class, 'showId'])->middleware('auth');

Route::post('/actualizar/{citaServicio}', [App\Http\Controllers\CitaServicioController::class, 'update'])->middleware('auth');
Route::post('/borrar/{id}', [App\Http\Controllers\CitaServicioController::class, 'destroy'])->middleware('auth');

/*---------------Propietario---------------*/
Route::resource('propietario', PropietarioController::class)->middleware('auth');
/*---------------Mascota---------------*/
Route::resource('mascota', MascotaController::class)->middleware('auth');
/*---------------Expediente---------------*/
Route::resource('expediente', ExpedienteController::class)->middleware('auth');

//Ejemplo consultar JS
Route::get('/mascota/consultar/{codigo}', [MascotaController::class, 'consultar'])->middleware('auth');
Route::get('/mascota/consultar_por_propietario/{id}', [MascotaController::class, 'mostrar_por_propietario'])->middleware('auth');


Route::get('/mascota/create/{id}', [MascotaController::class, 'crear']);
Route::get('/expediente/create/{id}', [ExpedienteController::class, 'crear']);

Route::get('expediente/pdf/{expediente}', [\App\Http\Controllers\ExpedienteController::class, 'pdf'])->middleware('auth');
Route::get('/exped/{id}', [ExpedienteController::class, 'pdfConverter'])->middleware('auth');

Route::resource('vacuna', VacunaController::class)->middleware('auth');
Route::resource('tiposervicio', TipoServicioController::class)->middleware('auth');

/*Mostrar citas vacunas*/
Route::get('/mostrarvacunas', [App\Http\Controllers\CitaVacunaController::class, 'show']);
//Obtengo los datos para pintarlos en el calendario de citas vacunas
Route::get('/editarCitaVacuna/{id}', [App\Http\Controllers\CitaVacunaController::class, 'edit'])->middleware('auth');
Route::get('/vacunas/{id}', [App\Http\Controllers\VacunaController::class, 'showId'])->middleware('auth');

/*Mostrar citas cirugias*/
Route::get('/mostrarcirugias', [App\Http\Controllers\CitaCirugiaController::class, 'show']);
Route::get('/editarCitaCirugia/{id}', [App\Http\Controllers\CitaCirugiaController::class, 'edit'])->middleware('auth');
Route::get('/cirugia/record', [\App\Http\Controllers\CitaCirugiaController::class, 'gestionar_cirugias_por_mascota'])->middleware('auth');

/*Recordatorio*/
Route::get('/recodatorio/enviar/', [RecordatorioController::class, 'enviar_mensaje']);
Route::get('/recordatorio/enviar_ui', [RecordatorioController::class, 'enviar_mensaje_ui']);
Route::get('/recordatorio/enviar_masivo', [RecordatorioController::class, 'enviar_mensaje_masivo']);
Route::resource('recordatorio', RecordatorioController::class)->middleware('auth');

//Citas de Limpieza dental
//ruta de los data-table
Route::resource('citaLimpiezaDental', CitaLimpiezaDentalController::class)->middleware('auth');
//ruta para entrar a la interfaz de agregar
Route::get('/crearCitaLimpiezaDental/{id}', [CitaLimpiezaDentalController::class, 'mostrar'])->name('citasLimpiezaDental.mostrar')->middleware('auth');
