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

use Illuminate\Support\Facades\Storage;
use Module\Employe\Entities\Employe;

Route::prefix('employe')->group(function() {
    Route::get('/', 'EmployeController@index')->name('employe::index');
    Route::get('/check', 'EmployeController@check')->name('employe::check');
    Route::get('/create', 'EmployeCreateController@index')->name('employe::create');
    Route::post('/store', 'EmployeCreateController@process')->name('employe::store');
    Route::get('/edit/{id}', 'EmployeController@edit')->name('employe::edit');
    Route::post('/update/{id}', 'EmployeController@update')->name('employe::update');
    Route::get('/read/{id}', 'EmployeController@show')->name('employe::read');
    Route::get('/remove/{id}', 'EmployeController@destroy')->name('employe::remove');
    Route::get('/frame-card/{id}', function($id) {
        return view('employe::framecard', [
            'row' => Employe::find($id)
        ]);
    })->name('employe::frame');
});
