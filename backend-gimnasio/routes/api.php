<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['jwt.auth']], function () {
	Route::get('rutinascliente/{id}', 'RutinaController@rutinasCliente');

	Route::get('rutinaslogueado', 'RutinaController@rutinasLogueado');

	Route::get('entrenadores', 'ClienteController@entrenadores');

	Route::resource('users' , 'UserController');

	Route::resource('clientes' , 'ClienteController');

	Route::resource('roles' , 'RolController');

	Route::resource('rutinas' , 'RutinaController');

	Route::resource('tipos_rutinas' , 'TipoRutinaController');

	Route::resource('progresos' , 'RegistroProgresoController');
});

//Ruta para Login
Route::post('/login', 'AuthController@authenticate');

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
