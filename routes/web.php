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
//
Route::get('/institutions/create', 'InstitutionsController@create');
Route::post('/institutions', 'InstitutionsController@store');
//
Route::get('/institution/{id?}', [
    'as' => 'institutionShow',
    'uses' => 'InstitutionsController@show'
]);


Route::get('/institutions/{id?}/edit', [
    'uses' => 'InstitutionsController@edit',
    'middleware' => 'roles',
    'roles' => ['manager']
]);
Route::post('/institutions/{id?}/update', [
    'uses' => 'InstitutionsController@update',
    'middleware' => 'roles',
    'roles' => ['manager']
]);


//
//Route::post('/institution/{id?}/update', 'InstitutionsController@update');
//
Route::post('/institution/{id?}/delete', 'InstitutionsController@destroy');

//Route::resource('institutions', 'InstitutionsController', ['middleware' => 'auth']);


//Assign Employee
Route::post('/institutions/{id?}/assign_update', [
    'uses' => 'InstitutionsController@assignUpdate',
    'middleware' => 'roles',
    'roles' => ['manager']
]);


Route::get('/users/{id?}', 'UsersController@show');