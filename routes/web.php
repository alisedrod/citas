<?php

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

Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');

Route::resource('especialidades', 'EspecialidadController');

Route::resource('medicos', 'MedicoController');

Route::resource('pacientes', 'PacienteController');

Route::resource('citas', 'CitaController');

Route::delete('enfermedades/destroyAll', 'EnfermedadController@destroyAll')->name('enfermedades.destroyAll');
Route::resource('enfermedades', 'EnfermedadController');

Route::delete('medicamentos/destroyAll', 'MedicamentoController@destroyAll')->name('medicamentos.destroyAll');
Route::resource('medicamentos', 'MedicamentoController');

Route::resource('tratamientos', 'TratamientoController');

Route::resource('localizaciones', 'LocalizacionController');


Auth::routes();

Route::get('/home', 'HomeController@index');

