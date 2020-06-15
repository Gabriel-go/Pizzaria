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

//Rotas para Usuario
Route::get('/', function(){
    return view('home');
});

Route::get('/sessao', 'SessionController@Session');

//Rotas para Usuario
Route::resource('/usuario', 'UsuarioControler');
Route::get('/login', 'UsuarioControler@login');
Route::get('/logar', 'UsuarioControler@logar');

//Rotas para funçao
Route::resource('/funcao', 'FuncaoController');
Route::get('/deletarFuncao/{id}', 'FuncaoController@destroy');

//Rotas para adicional
Route::resource('/adicional', 'AdicionalController');
Route::get('/deletarAdicional/{id}', 'AdicionalController@destroy');

//Rotas para clientes
Route::resource('/cliente', 'ClienteController');

//Rotas para clientes telefone
Route::resource('/clienteTelefone', 'ClienteTelefoneController');
Route::get('/clienteFoneCad/{id}', 'ClienteTelefoneController@create');
Route::get('/deletarClienteTelefone/{id}', 'ClienteTelefoneController@destroy');

//Rotas para clientes telefone
Route::resource('/clienteEndereco', 'ClienteEnderecoController');
Route::get('/clienteEnderecoCad/{id}', 'ClienteEnderecoController@create');
Route::get('/deletarClienteEndereco/{id}', 'ClienteEnderecoController@destroy');

//Rotas para Pizza
Route::resource('/pizza', 'PizzaController');
Route::get('/deletarPizza/{id}', 'PizzaController@destroy');

//Rotas para Pedido
Route::resource('/pedido', 'PedidoController');
Route::get('/novaSit/{id}', 'PedidoController@updateSituacao');

//Rotas para PedidoItem
Route::resource('/pedidoItem', 'PedidoItemController');
Route::get('/pedidoItemNovo/{id}', 'PedidoItemController@create');
Route::get('/deletarPedidoItem/{id}', 'PedidoItemController@destroy');



//Rotas para AdicionalItem
Route::resource('/adicionalItem', 'AdicionalItemController');
           