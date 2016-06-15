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

Route::get('/', function () {
    return view('welcome');
    

});
 // Rutas Medicos //
    Route::resource('medicos', 'MedicosController');
    Route::get('medicos/{id}/destroy', [
        'uses' => 'MedicosController@destroy',
        'as' => 'admin.medicos.destroy'
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
        'as' => 'admin.pacientes.destroy'
    ]);
     // Rutas Cirugias //
    Route::resource('cirugias', 'CirugiasController');
    Route::get('cirugias/{id}/destroy', [
        'uses' => 'CirugiasController@destroy',
        'as' => 'cirugias.destroy'
    ]);
