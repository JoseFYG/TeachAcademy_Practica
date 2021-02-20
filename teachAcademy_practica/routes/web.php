<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AlumnoController, AsignaturaController};

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('alumnos', AlumnoController::class);
Route::resource('asignaturas', AsignaturaController::class);

Route::get('matriculas/{alumno}', 'App\Http\Controllers\AlumnoController@asignaturasAlumno')
    ->name('matriculas.asignaturasalumno');

    Route::get('matriculas1/{asignatura}', 'App\Http\Controllers\AsignaturaController@alumnosAsignatura')
    ->name('matriculas.alumnosasignatura');

Route::delete('matriculas/{alumno}{asignatura}', 'App\Http\Controllers\AlumnoController@borrarMatricula')
    ->name('matriculas.borrar');

Route::get('matriculas/{alumno}{asignatura}{token}/edit', 'App\Http\Controllers\AlumnoController@editarMatricula')
    ->name('matriculas.edit');
Route::put('matriculas/{alumno}{asignatura}{token}', 'App\Http\Controllers\AlumnoController@updateMatricula')
    ->name('matriculas.update');

Route::get('matriculas/{alumno}/create', 'App\Http\Controllers\AlumnoController@createMatricula')
    ->name('matriculas.create');

Route::post('matriculas', 'App\Http\Controllers\AlumnoController@storeMatricula')
    ->name('matriculas.store');


Route::get('matriculas1/{asignatura}/create', 'App\Http\Controllers\AsignaturaController@createMatricula')
    ->name('matriculas1.create');

Route::post('matriculas1', 'App\Http\Controllers\AsignaturaController@storeMatricula')
    ->name('matriculas1.store');
