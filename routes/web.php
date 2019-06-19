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

Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::get('/home2', 'HomeController@index2')->middleware('auth');

Route::get('/listadoS', 'SupervisorController@index')->middleware('auth'); //ruta para listar supervisores

Route::get('/listadoO', 'OperatorController@index')->middleware('auth'); //ruta para listar operadores

Route::put('/desbloquear/{id}','SupervisorController@desbloquear')->middleware('auth'); //ruta para desbloquear cuenta

Route::put('/modificar/{id}','SupervisorController@modificar')->middleware('auth');  //ruta para formulario

Route::get('/registro','RegistryController@registro')->middleware('auth'); 

Route::post('/imprimirIntentos','UserController@controlInicioSesion')->middleware('auth');

Route::post('/registrar','RegistryController@registrar')->middleware('auth');;

Route::get('/agregarCentrales','CentralController@registro')->name('agregarCentrales');

Route::get('/agregarCentrales2','CentralController@registro2')->name('agregarCentrales2');

Route::post('/registrosCentrales','CentralController@registrar')->middleware('auth');

Route::get('/asociarCentrales','CentralController@asociarC')->name('/asociarCentrales')->middleware('auth');

Route::post('/asociandoCentral','CentralController@asociandoCentral')->middleware('auth');

Route::post('/realizarAsociancion','CentralController@realizarAsociancion')->middleware('auth');

Route::get('/editarAsociacion','CentralController@editandoAsociancion')->name('/editarAsociacion')->middleware('auth');

Route::post('/realizarEdicion','CentralController@realizarEdicion')->name('/realizarEdicion')->middleware('auth');

Route::post('/editar','CentralController@editar')->name('/editar')->middleware('auth');

Route::get('/eliminarAsociancion','CentralController@eliminarAsociancion')->name('/eliminarAsociancion')->middleware('auth');

Route::post('/realizarEliminacion','CentralController@realizarEliminacion')->name('/realizarEliminacion')->middleware('auth');


Route::put('/modificarDatos/{id}','SupervisorController@modificarDatos')->middleware('auth');  //ruta para editar datos

Route::put('/act/{id}','OperatorController@act'); //ruta para formulario de actualizar perfil

Route::put('actualizarDatos/{id}', 'OperatorController@actualizarDatos')->middleware('auth'); //ruta para actualizar datos

Route::get('/mapa', function () {
    return view('desarrollando');
});

?>