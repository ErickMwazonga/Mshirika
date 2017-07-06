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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/institutions', 'InstitutionsController@index');

Route::get('/institution/create', 'InstitutionsController@create');

Route::get('/institution/{id?}', 'InstitutionsController@show');

Route::get('/institution/edit', 'InstitutionsController@edit');

Route::post('/institution/{id?}/update', 'InstitutionsController@update');

Route::post('/institution/{id?}/delete', 'InstitutionsController@destroy');
