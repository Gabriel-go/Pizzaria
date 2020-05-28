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
Route::resource('/usuario', 'UsuarioControler');

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
           