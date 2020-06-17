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

Route::get('/home', 'TurnosController@index')->name('home');;

Route::get('/logout', 'Auth\LoginController@logout');

//cambiar edit turno por edit perfal
Route::get('/users/{user}', 'UsersController@edit')->name('users.edit')->middleware('can:edit_turno');

Route::patch('/users/{user}', 'UsersController@update');
Route::get('/getEvents', 'TurnosController@getEvents');

Route::post('/turnos', 'TurnosController@store');