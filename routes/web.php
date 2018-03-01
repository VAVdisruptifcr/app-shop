<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');



Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
		Route::get('/products', 'ProductController@index'); //ruta listado
		Route::get('/products/create', 'ProductController@create'); //ruta formulario
		Route::post('/products', 'ProductController@store'); //ruta registro
		Route::get('/products/{id}/edit', 'ProductController@edit'); //ruta de edición
		Route::post('/products/{id}/edit', 'ProductController@update'); //actualización
		Route::delete('/products/{id}', 'ProductController@destroy'); //formulario eliminar

		Route::get('/products/{id}/images', 'ImageController@index'); //ruta listado
		Route::post('/products/{id}/images', 'ImageController@store'); //ruta registro
		Route::delete('/products/{id}/images', 'ImageController@destroy'); //formulario eliminar
		Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //destacar

		Route::get('/categories', 'CategoryController@index'); //ruta listado
		Route::get('/categories/create', 'CategoryController@create'); //ruta formulario
		Route::post('/categories', 'CategoryController@store'); //ruta registro
		Route::get('/categories/{category}/edit', 'CategoryController@edit'); //ruta de edición
		Route::post('/categories/{category}/edit', 'CategoryController@update'); //actualización
		Route::delete('/categories/{category}', 'CategoryController@destroy'); //formulario eliminar


    });



