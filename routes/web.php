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

Auth::routes(['verify'=>true]);




Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/vacantes','VacanteController@index')->name('vacante.index');
    Route::get('/vacantes/create','VacanteController@create')->name('vacante.create');
    Route::post('/vacantes','VacanteController@store')->name('vacante.store');
    Route::delete('/vacantes/{vacante}','VacanteController@destroy')->name('vacante.destroy');
    Route::get('/vacantes/{vacante}/edit','VacanteController@edit')->name('vacante.edit');
    Route::put('/vacantes/{vacante}','VacanteController@update')->name('vacante.update');


    // Manejo de imagen
    Route::post('/vacantes/imagen','VacanteController@imagen')->name('vacante.imagen');
    Route::post('/vacantes/borrarimagen','VacanteController@borrarImagen')->name('vacante.borrar');



    //Cambiar EStado de la vacante
    Route::post('/vacantes/{vacante}','VacanteController@estado')->name('vacante.estado');


    //notificacion
    Route::get('/notificaciones','NotificationController')->name('notificacionses');
});


//pagina de inicio
Route::get('/','InicioController')->name('inicio');


Route::get('/categorias/{categoria}','CategoriaController@show')->name('categoria.show');


Route::get('/candidatos/{id}','CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store','CandidatoController@store')->name('candidatos.store');

Route::get('/busqueda/buscar','VacanteController@resultado')->name('vacante.resultado');
Route::post('/busqueda/buscar','VacanteController@buscar')->name('vacante.buscar');

Route::get('/vacantes/{vacante}','VacanteController@show')->name('vacante.show');




