<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;


use Illuminate\Http\Request;
use App\Http\Controllers\defuncionController;
use App\Http\Controllers\CitaVacunaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\CitaCirugiaController;
use App\Http\Controllers\gestionCitasVacunacionController;
use App\Http\Controllers\CitaLimpiezaDentalController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\TipoServicioController;
use App\Models\mascota;

//Controladores para SPATIE
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineaHistorialController;
use App\Http\Controllers\RecetasPostoperatoriaController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\RecordVacunacionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Models\citaLimpiezaDental;
use App\Models\record_vacunacion;
use Spatie\Permission\Contracts\Role;

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

/* ---------------------------//Rutas de Verificacion de correo---------------------------------------------------- */
Auth::routes(['verify' => true]);

//Vista que se ve cuando el usuario quiere ver algo antes de haber verificado su correo 
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//ruta para solicitar reenvio de link
Route::post('/email/verification-notification', function (Request $request) {
    //usuario activo
    // $request->user()->sendEmailVerificationNotification();
    $user = User::where('email', $request->input('email'))->first();
    //return ($user);
    $user->sendEmailVerificationNotification();

    return back()->with('success', 'Link de verificación envíado correctamente');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//vista luego de hacer clik en el boton del correo 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


/* ---------------------------//FIN DE Rutas de Verificacion de correo---------------------------------------------------- */

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

Route::resource('citacirugia/', CitaCirugiaController::class)->middleware('auth');
Route::get('citacirugia/crearCita/{id}', [CitaCirugiaController::class, 'mostrar'])->name('Cirugia.mostrar')->middleware('auth');
Route::post('/citacirugia', [CitaCirugiaController::class, 'store'])->name('Cirugia.store')->middleware('auth');
Route::get('CirugiaPDF/{id}', [CitaCirugiaController::class, 'pdf'])->name('Cirugia.pdf')->middleware('auth');



/*------------------------------------- Citas Vacunas---------------------------------------------------------------------------- */



Route::get('citas/index', [CitaVacunaController::class, 'index'])->name('citaVacuna.index')->middleware('auth');
Route::get('/crearCitaVacuna/{id}', [CitaVacunaController::class, 'mostrar'])->name('citaVacuna.mostrar')->middleware('auth');
Route::post('/guardarCitaVacuna', [CitaVacunaController::class, 'store'])->name('citaVacuna.store')->middleware('auth');

//Gestionar citas vacunacion
Route::get('/citas/show/gestion/{id}', [gestionCitasVacunacionController::class, 'show'])->name('gestionVacuna.show')->middleware('auth');
//Consulta de cita vacunaciion
Route::get('/citas/index/consulta/{id}/{citaVacuna_id}', [gestionCitasVacunacionController::class, 'index'])->name('gestionVacuna.index')->middleware('auth');
//Editar Cita Vacunacion
Route::get('/citas/edit/{id}/{citaVacuna_id}', [gestionCitasVacunacionController::class, 'edit'])->name('gestionVacuna.edit')->middleware('auth');
//actualizar
Route::post('actualizarCitaVacuna/{idCita}/{idmascota}', [gestionCitasVacunacionController::class, 'update'])->name('citaVacuna.update')->middleware('auth');
//Eliminar
Route::get('/citas/delete/gestion/{citaVacuna_id}', [gestionCitasVacunacionController::class, 'destroy'])->name('gestionVacuna.delete')->middleware('auth');


//RUTA PARA FUNCION JQUERY
Route::get('/obtenerDia/{id}', [CitaVacunaController::class, 'obtenerDias'])->name('diasVacuna.obtenerDias')->middleware('auth');

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
Route::get('/mostrar', [App\Http\Controllers\CitaServicioController::class, 'showCalendar']);
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
/*---------------Examen---------------*/
Route::resource('examen', ExamenController::class)->middleware('auth');
/*---------------Examen---------------*/
Route::resource('record', RecordVacunacionController::class)->middleware('auth');
// Route::get('/cartillapdf/{id}', [RecordVacunacionController::class, 'cartillapdf'])->middleware('auth');
Route::get('/cartilla/{id}', [RecordVacunacionController::class, 'cartillapdf'])->name('cartilla.pdf')->middleware('auth');


//Ejemplo consultar JS
//Mascota
Route::get('/mascota/consultar/{codigo}', [MascotaController::class, 'consultar'])->middleware('auth');
Route::get('/mascota/consultar_por_propietario/{id}', [MascotaController::class, 'mostrar_por_propietario'])->middleware('auth');
Route::get('/mascota/create/{id}', [MascotaController::class, 'crear']);
Route::get('/mascota/msg/editar', [MascotaController::class, 'mostrar_editar']);
Route::get('/mascota/msg/guardar', [MascotaController::class, 'mostrar_guardar']);

//Expediente
Route::get('/expediente/create/{id}', [ExpedienteController::class, 'crear']);
Route::get('expediente/pdf/{expediente}', [\App\Http\Controllers\ExpedienteController::class, 'pdf'])->middleware('auth');
Route::get('/exped/{id}', [ExpedienteController::class, 'pdfConverter'])->middleware('auth');
Route::get('/expediente/examenes/{id}',[ExpedienteController::class, 'examenes'])->middleware('auth');

//Examen
Route::get('/examen/store', [ExamenController::class, 'ExamenController@store']);

/*------------------------------------- Rutas de vacunas ------------------------------------------------------- */
Route::resource('vacuna', VacunaController::class)->middleware('auth');
Route::patch('/vacuna/{id}/{accion}', [VacunaController::class, 'update'])->name('Vacuna.update')->middleware('auth');
Route::get('/consultarCitasVacunaPorIdVacuna/{id}', [App\Http\Controllers\CitaVacunaController::class, 'consultarCitasVacunaPorIdVacuna'])->middleware('auth');
/*------------------------------------- Rutas de servicios ------------------------------------------------------- */
Route::resource('tiposervicio', TipoServicioController::class)->middleware('auth');
//Recuperar citas de servicios para eliminar el tipo de servicio
Route::get('/consultarCitasServicioPorIdServicio/{id}', [App\Http\Controllers\CitaServicioController::class, 'consultarCitasServicioPorIdServicio'])->middleware('auth');
Route::patch('/tiposervicio/{id}/{accion}', [TipoServicioController::class, 'update'])->name('Tiposervicio.update')->middleware('auth');

/*Mostrar citas vacunas*/
Route::get('/mostrarvacunas', [App\Http\Controllers\CitaVacunaController::class, 'showCalendar']);
//Obtengo los datos para pintarlos en el calendario de citas vacunas
Route::get('/editarCitaVacuna/{id}', [App\Http\Controllers\CitaVacunaController::class, 'edit'])->middleware('auth');
Route::get('/vacunas/{id}', [App\Http\Controllers\VacunaController::class, 'showId'])->middleware('auth');

/*Mostrar citas cirugias*/
Route::get('/mostrarcirugias', [App\Http\Controllers\CitaCirugiaController::class, 'showCalendar']);
Route::get('/editarCitaCirugia/{id}', [App\Http\Controllers\CitaCirugiaController::class, 'edit'])->middleware('auth');
Route::get('/citacirugia/index/gestionarCirugia/{id}', [\App\Http\Controllers\CitaCirugiaController::class, 'gestionar_cirugias_por_mascota'])->name('GestionCirugia.index')->middleware('auth');
Route::resource('citacirugia', CitaCirugiaController::class)->middleware('auth');
Route::get('/citacirugia/consultarCitaCirugia/{id}', [\App\Http\Controllers\CitaCirugiaController::class, 'show'])->middleware('auth');
Route::get('/citacirugia/editarCitaCirugia/{id}', [\App\Http\Controllers\CitaCirugiaController::class, 'editarCirugia'])->middleware('auth');
Route::post('/citacirugia/index/gestionarCirugia/{id}', [App\Http\Controllers\CitaCirugiaController::class, 'update'])->name('GestionCirugia.update')->middleware('auth');


/*Recordatorio*/
Route::get('/recodatorio/enviar/', [RecordatorioController::class, 'enviar_mensaje'])->middleware('auth');
Route::get('/recordatorio/enviar_ui', [RecordatorioController::class, 'enviar_mensaje_ui'])->middleware('auth');
Route::get('/recordatorio/enviar_masivo', [RecordatorioController::class, 'enviar_mensaje_masivo'])->middleware('auth');
Route::get('/recordatorio/eliminar_masivo', [RecordatorioController::class, 'eliminar_de_un_jalon'])->middleware('auth');
Route::get('/recordatorio/reenviar/{id}', [RecordatorioController::class, 'reenviar'])->middleware('auth');
Route::resource('recordatorio', RecordatorioController::class)->middleware('auth');

//Citas de Limpieza dental
//ruta de los data-table
Route::resource('citaLimpiezaDental', CitaLimpiezaDentalController::class)->middleware('auth');
//ruta para entrar a la interfaz de agregar
Route::get('/crearCitaLimpiezaDental/{id}', [CitaLimpiezaDentalController::class, 'mostrar'])->name('citasLimpiezaDental.mostrar')->middleware('auth');
Route::post('/guardarCitaLimpieza', [CitaLimpiezaDentalController::class, 'store'])->name('citasLimpiezaDental.store')->middleware('auth');
//Obtengo los datos para pintarlos en el calendario de cita de limpieza dental
Route::get('/editarCitaLimpiezaDental/{id}', [App\Http\Controllers\CitaLimpiezaDentalController::class, 'edit'])->middleware('auth');
//mostrar las citas de limpieza dental en la agenda
Route::get('/mostrarlimpiezadental', [App\Http\Controllers\CitaLimpiezaDentalController::class, 'showCalendar']);

//ruta para recuperar el id de la mascota
Route::get('/mascotas/{id}', [App\Http\Controllers\MascotaController::class, 'showId'])->middleware('auth');


//Rutas Limpieza dental
//Route::get('/citaLimpiezaDental/gestion/record/{id}', [\App\Http\Controllers\CitaLimpiezaDentalController::class, 'gestionar_limpiezas_por_mascota'])->middleware('auth');
Route::get('/citaLimpiezaDental/index/gestion/{id}', [CitaLimpiezaDentalController::class, 'gestionar_limpiezas_por_mascota'])->name('GestionLimpieza.index')->middleware('auth');
Route::get('/citaLimpiezaDental/show/consulta/{id}/{citaLimpieza_id}', [CitaLimpiezaDentalController::class, 'show'])->name('GestionLimpieza.show')->middleware('auth');
Route::get('/citaLimpiezaDental/delete/gestion/{citaLimpieza_id}', [CitaLimpiezaDentalController::class, 'destroy'])->name('GestionLimpieza.delete')->middleware('auth');
//Editar cita limpieza dental
Route::get('/citaLimpiezaDental/edit/{id}/{citaLimpieza_id}', [CitaLimpiezaDentalController::class, 'editarLimpieza'])->name('GestionLimpieza.edit')->middleware('auth');
Route::post('actualizarcitaLimpiezaDental/{idCitaLimpieza}/{idmascota}', [CitaLimpiezaDentalController::class, 'update'])->name('citaLimpieza.update')->middleware('auth');

//Ruta Receta postoperatoria 
//Route::get('/citacirugia/crearRecetaPostoperatoria/{id}', [App\Http\Controllers\RecetasPostoperatoriaController::class, 'mostrar'])->name('recetaPost.mostrar')->middleware('auth');
Route::get('/citacirugia/crear_receta_postoperatoria/{id}', [RecetasPostoperatoriaController::class, 'create'])->middleware('auth');
Route::get('/receta_post_operatoria/guardar', [RecetasPostoperatoriaController::class, 'guardar_bd'])->middleware('auth');

/* 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
//Rutas Recetas medicas
Route::get('receta_medica/', [App\Http\Controllers\RecetaMedicasController::class, 'index'])->name('recetaMedica.index')->middleware('auth');
Route::get('crear/receta_medica/{id}', [App\Http\Controllers\RecetaMedicasController::class, 'create'])->middleware('auth');
Route::get('/receta_medica/guardar', [App\Http\Controllers\RecetaMedicasController::class, 'guardar_bd'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


//Historial Medico
Route::get('/historialMedico/{id}', [ExpedienteController::class, 'gestionar_historial_Medico'])->name('historialmedico.index')->middleware('auth');
Route::get('/historial_medico/fetch', [LineaHistorialController::class, 'fetch']);
Route::get('/historial/edit_editable/', [LineaHistorialController::class, 'edit_editable']);
Route::get('/historial/eliminar/{lineaHistorial}', [LineaHistorialController::class, 'destroy'])->name('historialMedico.delete')->middleware('auth');

//Record vacunacion
Route::get('/record/edit/fecha', [RecordVacunacionController::class, 'edit_table_fecha']);
Route::get('/record/edit/refuerzo', [RecordVacunacionController::class, 'edit_table_refuerzo']);
Route::get('/record/edit/peso', [RecordVacunacionController::class, 'edit_table_peso']);

/* 
* * Rutas para sección reportes 
*/
Route::get('/reporte', [ReporteController::class, 'index'])->name('reportes.index')->middleware('auth');

