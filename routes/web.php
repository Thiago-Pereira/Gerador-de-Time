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

Route::get('/', 'JogadoresController@index')->name('home');

Route::post('salvarjogadores', 'JogadoresController@salvar');

Route::post('geratime', 'JogadoresController@selecionaTime');

Route::get('exclusao/{id}', 'JogadoresController@delete');

Route::get('editando', 'JogadoresController@alterar');

Route::get('recupera/{id}', 'JogadoresController@recover');