<?php

use Illuminate\Support\Facades\Route;

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

// Enlaces para el panel de control, solo están disponibles para que los vea un usuario autenticado
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {
    Route::get('/links', 'LinkController@index');
    Route::get('/links/new', 'LinkController@create');
    Route::post('/links/new', 'LinkController@store');
    Route::get('/links/{link}', 'LinkController@edit');
    Route::post('/links/{link}', 'LinkController@update');
    Route::delete('/links/{link}', 'LinkController@destroy');

    Route::get('/settings', 'UserController@edit'); // editar links
    Route::post('/settings', 'UserController@update'); // actualizar configuraciones de perfil
});

// Registrar visitas a los enlaces para que el usuario pueda ver cuando un visitante haga clic en uno
Route::post('/visit/{link}', 'VisitController@store');

// Mostrar lista de enlaces del usuario: linktree.samuel.localhost/username
Route::get('/{user}', 'UserController@show');
Auth::routes();
