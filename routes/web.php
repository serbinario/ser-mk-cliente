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


Auth::routes();

Route::get('/', 'DebitosController@index')
    ->name('index');

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/notificationUrl', 'NotificationUrl@notificationUrl')->name('notificationUrl');

//Route::any('/enableDisableSecret', 'NotificationUrl@notificationUrl')->name('notificationUrl');


Route::get('/meusDados', 'MeusDadosController@index')->name('meusDados');


Route::group(
[
    'prefix' => 'debitos',
], function () {

    Route::get('/', 'DebitosController@index')
         ->name('debitos.debitos.index');

    Route::get('/create','DebitosController@create')
         ->name('debitos.debitos.create');

    Route::get('/grid', 'DebitosController@grid')
         ->name('debitos.debitos.grid');

    Route::get('/modalGrid', 'DebitosController@modalgrid')
        ->name('debitos.debitos.modalgrid');

    Route::get('/show/{debitos}','DebitosController@show')
         ->name('debitos.debitos.show')
         ->where('id', '[0-9]+');

    Route::get('/{debitos}/edit','DebitosController@edit')
         ->name('debitos.debitos.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DebitosController@store')
         ->name('debitos.debitos.store');

    Route::post('/cancelCharge', 'DebitosController@cancelCharge')
        ->name('debitos.cancelCharge');


    Route::get('/knob', 'DebitosController@knob')
        ->name('debitos.debitos.knob');
               
    Route::put('debitos/{debitos}', 'DebitosController@update')
         ->name('debitos.debitos.update')
         ->where('id', '[0-9]+');

    Route::delete('/{debitos}/destroy','DebitosController@destroy')
         ->name('debitos.debitos.destroy')
         ->where('id', '[0-9]+');


});
