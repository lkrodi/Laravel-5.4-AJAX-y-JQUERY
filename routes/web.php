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

/*Este método contiene para las rutas de autenticación*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Convención del método DELETE es: 
Route::DELETE('ruta_a_mostrar_en_url/{parametro}', 'Controlador@método')->name('ruta_principal');
*/
/*Por convención tuve que quitarle en la parte de:
	name('destno/producto'); por
	name('destroyProduct');
	Debido a que en mi vista home de autenticación, defino como ruta del form con método DELETE a:
	'destroyProduct'
*/

Route::DELETE('/eliminar-producto/{id}', 'HomeController@destroyProduct')->name('destroyProduct');