<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\Event as EventResource;
use App\Turno;

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

Auth::routes();

Route::get('/home', 'TurnosController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

//cambiar edit turno por edit perfil
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit')->middleware('can:edit_turno');

Route::patch('/users/{user}', 'UsersController@update')->name('users.update');

Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::get('/clientes/create', 'ClientesController@create')->name('clientes.create');
Route::post('/clientes', 'ClientesController@store')->name('clientes.store');
Route::get('/clientes/{idCliente}/edit', 'ClientesController@edit')->name('clientes.edit');
Route::patch('/clientes/{idCliente}', 'ClientesController@update')->name('clientes.update');
Route::delete('/clientes/{idCliente}', 'ClientesController@destroy')->name('clientes.destroy');

Route::get('/turnos/create-step-1', 'TurnosController@createStep1')->name('turnos.create.step1');
Route::post('/turnos/create-step-1', 'TurnosController@postCreateStep1')->name('turnos.createStep1');
Route::get('/turnos/create-step-2/{idCliente}', 'TurnosController@createStep2')->name('turnos.create.step2');
Route::post('/turnos/create-step-2/{idCliente}', 'TurnosController@postCreateStep2')->name('turnos.createStep2');
Route::get('/turnos/create-step-3/{idCliente}', 'TurnosController@createStep3')->name('turnos.create.step3');
Route::post('/turnos', 'TurnosController@store')->name('turnos.store');
Route::get('/turnos/{idTurno}/edit', 'TurnosController@edit')->name('turnos.edit');
Route::patch('/turnos/{idTurno}', 'TurnosController@update')->name('turnos.update');
Route::delete('/turnos/{idTurno}', 'TurnosController@destroy')->name('turnos.destroy');