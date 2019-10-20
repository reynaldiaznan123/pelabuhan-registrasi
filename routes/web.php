<?php

use App\Imports\Employe;
use Maatwebsite\Excel\Facades\Excel;
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
    request()->session()->forget('form_steps');
    return view('welcome');
    // Excel::import(new Employe, '/home/reynaldiaznan/Downloads/asda.xls');
})->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
