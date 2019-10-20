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

Route::prefix('authentication')->group(function() {
    Route::get('/', 'AuthController@index')->name('authentication::index');
    Route::get('/create', 'AuthController@create')->name('authentication::create');
    Route::post('/store', 'AuthController@store')->name('authentication::store');
    Route::get('/edit/{id}', 'AuthController@edit')->name('authentication::edit');
    Route::put('/update/{id}', 'AuthController@update')->name('authentication::update');
    Route::delete('/delete/{id}', 'AuthController@destroy')->name('authentication::delete');
    Route::get('/show/{id}', 'AuthController@show')->name('authentication::show');
});
