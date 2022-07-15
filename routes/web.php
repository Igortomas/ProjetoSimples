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

Route::get('/clientes', 'App\Http\Controllers\ClienteController@index')->name('cliente');
Route::get('/clientes/novo', 'App\Http\Controllers\ClienteController@create')->name('cliente.novo');
Route::post('/clientes/store', 'App\Http\Controllers\ClienteController@store')->name('cliente.store');
