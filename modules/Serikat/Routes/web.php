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

Route::prefix('serikat')->middleware(['auth'])->group(function() {
    Route::get('/', 'SerikatController@index')->name('serikat::index');
    Route::get('/create', 'SerikatController@create')->name('serikat::create');
    Route::post('/store', 'SerikatController@store')->name('serikat::store');
    Route::get('/edit/{id}', 'SerikatController@edit')->name('serikat::edit');
    Route::put('/update/{id}', 'SerikatController@update')->name('serikat::update');
    Route::get('/read/{id}', 'SerikatController@show')->name('serikat::read');
});
