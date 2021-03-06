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

Route::get('/','PedidoController@index')->name('pedidos.index');
Route::post('/pedido/create', 'PedidoController@create')->name('criar.pedido');
Route::get('/pedido/delete/{id}', 'PedidoController@delete')->name('excluir.pedido');
