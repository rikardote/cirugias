<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', function () {
    return redirect()->route('programar_cirugia.index'); 
    
});
     // Rutas Medicos //
    Route::resource('medicos', 'MedicosController');
    Route::get('medicos/{id}/destroy', [
        'uses' => 'MedicosController@destroy',
        'as' => 'medicos.destroy'
    ]);
    // Rutas Especialidades //
    Route::resource('especialidades', 'EspecialidadesController');
    Route::get('especialidades/{id}/destroy', [
        'uses' => 'EspecialidadesController@destroy',
        'as' => 'especialidades.destroy'
    ]);
     // Rutas Medicos //
    Route::resource('anestesiologos', 'AnestesiologosController');
    Route::get('anestesiologos/{id}/destroy', [
        'uses' => 'AnestesiologosController@destroy',
        'as' => 'anestesiologos.destroy'
    ]);
     // Rutas Pacientes //
    Route::resource('pacientes', 'PacientesController');
    Route::get('pacientes/{id}/destroy', [
        'uses' => 'PacientesController@destroy',
        'as' => 'pacientes.destroy'
    ]);

     // Rutas Pacientes //
    Route::resource('pacientes', 'PacientesController');
    Route::get('pacientes/{id}/destroy', [
        'uses' => 'PacientesController@destroy',
        'as' => 'pacientes.destroy'
    ]);
     // Rutas Cirugias //
    Route::resource('cirugias', 'CirugiasController');
    Route::get('cirugias/{id}/destroy', [
        'uses' => 'CirugiasController@destroy',
        'as' => 'cirugias.destroy'
    ]);
    // Colonias Autocomplete
    Route::get('/getColonias', [
        'uses' => 'PacientesController@autocomplete',
        'as' => 'colonias.autocomplete'
    ]);
    // Rutas Programacion de cirugias //
    Route::resource('programar_cirugia', 'ProgramacionController',
         ['except' => ['destroy']]);
    Route::get('programar_cirugia/{id}/destroy', [
        'uses' => 'ProgramacionController@destroy',
        'as' => 'programar_cirugia.destroy'
    ]);
    Route::get('programar_cirugia/{date}/nueva', [
        'uses' => 'ProgramacionController@nueva',
        'as' => 'programar_cirugia.nueva'
    ]);
    Route::get('programar_cirugia/{date}/paciente', [
        'uses' => 'SearchPacientesController@index',
        'as' => 'pacientes.search'
    ]);
    Route::get('programar_cirugia/{date}/pdf', [
        'uses' => 'ProgramacionController@pdf',
        'as' => 'reportes.diarias.pdf'
    ]);
    Route::get('programar_cirugia/reporte_semanal/show', [
        'uses' => 'ProgramacionController@reporte_semanal',
        'as' => 'reportes.semanal'
    ]);
    Route::post('programar_cirugia/reporte_semanal/show', [
        'uses' => 'ProgramacionController@reporte_semanal_pdf',
        'as' => 'reportes.semanal.pdf'
    ]);
    Route::get('programar_cirugia/{id}/realizada', [
        'uses' => 'ProgramacionController@realizada',
        'as' => 'cirugia.realizada'
    ]);
    Route::get('programar_cirugia/{id}/reprogramar', [
        'uses' => 'ProgramacionController@reprogramar',
        'as' => 'cirugia.reprogramar'
    ]);
    Route::post('programar_cirugia/{id}/reprogramar/update/store', [
        'uses' => 'ProgramacionController@reprogramar_update_store',
        'as' => 'reprogramar_cirugia.r_u_e'
    ]);
    Route::get('programar_cirugia/{id}/suspender', [
        'uses' => 'ProgramacionController@suspender',
        'as' => 'cirugia.suspender'
    ]);
    Route::post('programar_cirugia/{id}/suspender/post', [
        'uses' => 'ProgramacionController@suspender_post',
        'as' => 'cirugia.suspender.post'
    ]);
});

Route::auth();

Route::get('/home', 'HomeController@index');
