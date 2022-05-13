<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ReportesController;
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
	
	Route::resource('/profesores',ProfesoresController::class);
	Route::resource('/periodos',PeriodoController::class);
	Route::resource('/programas',ProgramaController::class);
	Route::resource('/asignaturas',AsignaturaController::class);
	
});