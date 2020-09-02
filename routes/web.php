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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index',function ()
{
    return view('index');
});

Route::get('/presupuesto','HomeController@showCalculadora')->name("calculadora");

Route::group(['middleware'=>'admin'],function(){
    //! Rutas de administrador.
    Route::get('/admin',function(){return view('admin.index');})->name('admin');

    Route::get('/client/{id}/delete', 'ClientController@destroy')->name('client.delete');
    Route::get('/client/search', 'ClientController@search')->name('client.search');
    Route::resource('client','ClientController');

    Route::get('/work/{id}/delete', 'WorkController@destroy')->name('work.delete');
    Route::get('work/asignee/{id}','WorkController@asignee')->name('work.asignee');

    Route::get('/calculadora/{calculadora}/delete', 'CalculadoraController@destroy')->name('calculadora.delete');
    Route::resource('calculadora','CalculadoraController');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/work/search', 'WorkController@search')->name('work.search');
    Route::resource('work','WorkController');
});

//! Rutas de instalador.
Route::get('trabajo/{id}/formulario', 'WorkController@update')->name('work.editar');
Route::get('reset/password', 'ForgotPasswordController@forgotPassword')->name('password.forgot');
Route::post('reset/password', 'ForgotPasswordController@resetPassword')->name('password.reset');
Route::get('tecnic', 'TecnicController@index')->name('tecnic.index');
