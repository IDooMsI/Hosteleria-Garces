<?php

use App\Category;
use App\Subcategory;
use App\SubSubcategory;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\SubcategoryCollection as SubcategoryResource;
use App\Http\Resources\SubsubcategoryCollection as SubsubcategoryResource;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/presupuesto','HomeController@showCalculadora')->name("calculadora");

Route::get('/subcategories/categories/{id}', function ($id) {
    return new SubcategoryResource(Subcategory::where('category_id', $id)->get());
});

Route::get('subsubcategories/subcategories/{id}', function ($id) {
    return new SubsubcategoryResource(Subsubcategory::where('subcategory_id', $id)->get());
});

Route::get('/publicaciones/{nombre}', 'HomeController@showAllPublications');

Route::group(['middleware'=>'admin'],function(){
    //! Rutas de administrador.
    Route::get('/admin',function(){return view('admin.index');})->name('admin');

    Route::get('/client/{id}/delete', 'ClientController@destroy')->name('client.delete');
    Route::get('/client/search', 'ClientController@search')->name('client.search');
    Route::resource('client','ClientController');

    Route::get('/work/{id}/delete', 'WorkController@destroy')->name('work.delete');
    Route::get('work/asignee/{id}','WorkController@asignee')->name('work.asignee');

    Route::get('/calculator/{calculator}/delete', 'CalculadoraController@destroy')->name('calculator.delete');
    Route::resource('calculator', 'CalculadoraController');

    Route::get('/publication/{id}/delete', 'PublicationController@destroy')->name('publication.delete');
    Route::resource('publication', 'PublicationController');

    Route::get('/category/{id}/delete', 'CategoryController@destroy')->name('category.delete');
    Route::resource('category','CategoryController');

    Route::get('/category/{id}/delete', 'CategoryController@destroy')->name('category.delete');
    Route::resource('category','CategoryController');

    Route::get('/subcategory/{id}/delete', 'SubcategoryController@destroy')->name('subcategory.delete');
    Route::resource('subcategory', 'SubcategoryController');

    Route::get('/subsubcategory/{id}/delete', 'SubsubcategoryController@destroy')->name('subsubcategory.delete');
    Route::resource('subsubcategory', 'SubsubcategoryController');

    //! Rutas de instalador.
    Route::get('trabajo/{id}/formulario', 'WorkController@update')->name('work.editar');
    Route::get('reset/password', 'ForgotPasswordController@forgotPassword')->name('password.forgot');
    Route::post('reset/password', 'ForgotPasswordController@resetPassword')->name('password.reset');
    Route::get('tecnic', 'TecnicController@index')->name('tecnic.index');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/tecnic', 'TecnicController@index')->name('tecnic.index');
    Route::get('/work/search', 'WorkController@search')->name('work.search');
    Route::resource('work','WorkController');
});

    //! Variables golbales.
    View::composer('index', function ($view) {
        $categories = Category::all();
        $view->with('categories', $categories);
    });
    View::composer('index', function ($view) {
        $subcategories = Subcategory::all();
        $view->with('subcategories', $subcategories);
    });
    View::composer('index', function ($view) {
        $subsubcategories = SubSubcategory::all();
        $view->with('subsubcategories', $subsubcategories);
    });

