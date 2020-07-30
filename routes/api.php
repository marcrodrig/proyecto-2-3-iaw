<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Auth\AuthController@login');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/logoutAPI', 'Auth\AuthController@logoutAPI');
    Route::get('/turnos', 'TurnosController@list');
    Route::get('/turnos/{id}', 'TurnosController@get');
    Route::get('/clientes', 'ClientesController@list');
    Route::get('/clientes/{id}', 'ClientesController@get');
    Route::get('/reservas', 'ReservasController@list');
    Route::post('/clientes', 'ClientesController@crearCliente');
    Route::put('/clientes/{id}', 'ClientesController@editarCliente');
    Route::delete('/clientes/{id}', 'ClientesController@eliminarCliente');
    Route::post('/turnos', 'TurnosController@crearTurno');
    Route::put('/turnos/{id}', 'TurnosController@editarTurno');
    Route::delete('/turnos/{id}', 'TurnosController@eliminarTurno');
});