<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\PDEController;

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



Route::middleware('guest')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
});

Auth::routes();
Route::group(['middleware' => ['web', 'auth']], function() {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('cotizaciones/{id_cotizacion}/contestada',[PreCotizacionesController::class,'contestada'])->name('cotizaciones.contestada');
	Route::get('/programas/{id_programa}/buscar_asignaturas',[ProgramaController::class,'buscar_asignaturas'])->name('programas.buscar_asignaturas');
	Route::post('profesores/asignar',[ProfesoresController::class,'asignar'])->name('profesores.asignar');
	Route::get('/pde/{id_asignacion}/crear_pde',[PDEController::class,'crear_pde'])->name('pde.crear_pde');
	Route::get('/pde/listar',[PDEController::class,'listar_pde'])->name('pde.listar');
	Route::get('/pde/{id_pde}/editar_estrategia',[PDEController::class,'editar_estrategia'])->name('pde.editar_estrategia');
	Route::post('pde/editar_pde',[PDEController::class,'editar_pde'])->name('pde.editar_pde');
	Route::get('/pde/{id_asignacion}/ver_pde',[PDEController::class,'ver_pde'])->name('pde.ver_pde');

	Route::resource('/profesores',ProfesoresController::class);
	Route::resource('/periodos',PeriodoController::class);
	Route::resource('/programas',ProgramaController::class);
	Route::resource('/asignaturas',AsignaturaController::class);
	Route::resource('/pde',PDEController::class);
	
});