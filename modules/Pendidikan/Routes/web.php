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

Route::prefix('pendidikan')->middleware(['auth'])->group(function() {
    Route::get('/', 'PendidikanController@index')->name('pendidikan::index');
    Route::get('/create', 'PendidikanController@create')->name('pendidikan::create');
    Route::post('/store', 'PendidikanController@store')->name('pendidikan::store');
    Route::get('/edit/{id}', 'PendidikanController@edit')->name('pendidikan::edit');
    Route::put('/update/{id}', 'PendidikanController@update')->name('pendidikan::update');
});
