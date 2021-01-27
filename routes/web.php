<?php


Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/products', 'ProductController@index'); // listado
	Route::get('/products/create', 'ProductController@create'); // ver el formulario
	Route::post('/products', 'ProductController@store'); // guardar datos del formulario
	Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario edicion
	Route::post('/products/{id}/edit', 'ProductController@update'); // actualizar datos del formulario
	Route::delete('/products/{id}', 'ProductController@destroy'); // formulario eliminar

	Route::get('/products/{id}/images', 'ImageController@index'); // listado
	Route::post('/products/{id}/images', 'ImageController@store'); // registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); // formulario eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // destacar
	// CR
	// UD
	// Otros métodos: DELETE, PUT, PATCH

	Route::get('/categories', 'CategoryController@index'); // listado
	Route::get('/categories/create', 'CategoryController@create'); // ver el formulario
	Route::post('/categories', 'CategoryController@store'); // guardar datos del formulario
	Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario edicion
	Route::post('/categories/{category}/edit', 'CategoryController@update'); // actualizar datos del formulario
	Route::delete('/categories/{category}', 'CategoryController@destroy'); // formulario eliminar
});