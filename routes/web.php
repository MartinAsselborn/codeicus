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

Route::get('/', 'ShareController@index')->name('index');
Route::resource('shares', 'ShareController');
Route::get('/import', 'ShareController@import')->name('import');
Route::post('/send', 'ShareController@send')->name('send');