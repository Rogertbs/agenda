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

// Route::get('/', function () {
//     return view('welcome');
// });
//
//Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'api'), function()
{
    Route::get('/', function(){
        return response()->json(['message' => 'Agenda API', 'status' => 'Connected']);
    });

    Route::resource('medicos', 'MedicosController');
    Route::resource('pacientes', 'PacientesController');
    Route::resource('agendas', 'AgendasController');

    Route::post('auth/login', 'AuthController@authenticate');

});

Route::get('/', function (){
    return redirect('api');
});
