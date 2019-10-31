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

//* VIEWS *//

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

//* API *//
Route::post('cash', 'CashMachineController@index');
Route::get('erro', 'CashMachineController@erro');
Route::get('sucesso', 'CashMachineController@sucesso');