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

//! vista para probar la navbar
Route::get('/index',function ()
{
    return view('index');
});


//! Rutas de administrador.

Route::get('/admin',function()
{
    return view('admin.index');
})->name('admin');

Route::get('/client/{id}/delete', 'ClientController@destroy')->name('client.delete');
Route::get('/client/search', 'ClientController@search')->name('client.search');
Route::resource('client','ClientController');

Route::get('/work/{id}/delete', 'WorkController@destroy')->name('work.delete');
Route::get('/work/search', 'WorkController@search')->name('work.search');
// Route::get('work/{id}','WorkController@store')->name('work.store');
Route::resource('work','WorkController');
