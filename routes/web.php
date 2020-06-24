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
Route::get('/clientes/{idCliente}/edit', 'ClientesController@edit')->name('clientes.edit');
Route::patch('/clientes/{idCliente}', 'ClientesController@update')->name('clientes.update');
Route::delete('/clientes/{idCliente}', 'ClientesController@destroy')->name('clientes.destroy');

Route::post('/turnos', 'TurnosController@store');
Route::get('/turnos/create', 'TurnosController@create')->name('turnos.create');
Route::get('/turnos/{idTurno}/edit', 'TurnosController@edit')->name('turnos.edit');
Route::patch('/turnos/{idTurno}', 'TurnosController@update')->name('turnos.update');
Route::delete('/turnos/{idTurno}', 'TurnosController@destroy')->name('turnos.destroy');