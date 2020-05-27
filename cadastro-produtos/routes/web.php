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
    return view('index');
});


Route::get('/produtos', 'ControllerProduto@index');
Route::post('/produtos', 'ControllerProduto@store');
Route::get('/produtos/novo', 'ControllerProduto@create');
Route::get('/produtos/editar/{id}', 'ControllerProduto@edit');
Route::post('/produtos/{id}', 'ControllerProduto@update');
Route::get('/produtos/apagar/{id}', 'ControllerProduto@destroy');


Route::get('/categorias', 'ControllerCategoria@index');
Route::get('/categorias/novo', 'ControllerCategoria@create');
Route::post('/categorias', 'ControllerCategoria@store');
Route::post('/categorias/{id}', 'ControllerCategoria@update');
Route::get('/categorias/apagar/{id}', 'ControllerCategoria@destroy');
Route::get('/categorias/editar/{id}', 'ControllerCategoria@edit');
