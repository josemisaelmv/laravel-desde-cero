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

// Route::get('/', function () {
//     return view('welcome');
// })->name('main');
Route::get('/', 'MainController@index')->name('main');

//  Ruta general beneficio de consistencia de codigo
Route::resource('products','ProductController');
Route::resource('products.carts','ProductCartController')->only(['store', 'destroy']);
//  Ruta general para solo mostrar vistas especificas
// Route::resource('products','ProductController')->only(['index','show']);
//  Ruta general para solo mostrar vistas excepto las planteadas
// Route::resource('products','ProductController')->except(['show']);

/*
// Rutas ingresadas manualmente

Route::get('products', 'ProductController@index')->name('products.index');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::post('products','ProductController@store')->name('products.store');
//Buscar por id
Route::get('products/{product}','ProductController@show')->name('products.show');
//Buscar por titulo
// Route::get('products/{product:title}','ProductController@show')->name('products.show');

Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

Route::match(['put','patch'],'products/{product}', 'ProductController@update')->name('products.update');

Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
