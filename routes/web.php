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


Route::get('/', function () {
    return view('welcome');
});

*/
//Rutas del Frond End


Route::get('/', 'registrocontroller@index')->name('index.inicio');
Route::post('/guardar', 'registrocontroller@store')->name('index.guardar');
Route::get('/recuperar', 'registrocontroller@recupera')->name('index.recu');
Route::post('/restort', 'registrocontroller@rec')->name('index.recuser');
Route::get('/Obtenerconstancia', 'registrocontroller@mostrarcons')->name('index.mostrar');
Route::post('/constancia', 'registrocontroller@constancipdf')->name('index.consbuscar');
Route::get('/ValidarConstanciaQr/{codigo}', 'registrocontroller@validacons')->name('index.validacon');
Route::get('/register/verify/{code}', 'registrocontroller@confirmemail')->name('index.confirmal');


//Route::get('/listar', 'registrocontroller@listar')->name('index.listar');
//Rutas del Back End
Route::get('/lista', 'backendevento@listar')->name('back.listar');
Route::get('/confirmacion', 'backendevento@listarconfirma')->name('back.confirm');
Route::get('/dashboard', 'backendevento@index')->name('back.index');
Route::post('/guardarb', 'backendevento@store')->name('back.guardar');
Route::post('/eliminar', 'backendevento@eliminarpart')->name('back.delet');
Route::get('/modificarp/{id}', 'backendevento@modificarp')->name('back.modific');
Route::post('/actualizaparti', 'backendevento@guarmodi')->name('back.guarmodi');

Route::get('/listarvuejs', 'backendevento@listarvj')->name('back.listarvuej');

Route::get('/Busqueda', 'backendevento@busquedaparti')->name('back.busca');
//


Route::get('/regirige','backendevento@redireconfirm')->name('bacck.web');
Route::post('/buscarparti', 'backendevento@busquedap')->name('back.buscar');
Route::post('/actualiestadop', 'backendevento@actualizarbusqe')->name('back.actubusc');

Route::post('/enviaremail', 'backendevento@enviarmail')->name('back.mail');
//Route::get('/editarb/{id?}', 'backendevento@edit')->name('back.editarp');
//Route::post('/logauth', 'backendevento@regirige')->name('back.red');
Route::get('/logauth', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/login');
})->name('back.logau');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


