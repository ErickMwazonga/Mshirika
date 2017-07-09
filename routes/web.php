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

//Institution Routes
Route::get('/institutions', 'InstitutionsController@index');
Route::get('/institutions/create', 'InstitutionsController@create');
Route::post('/institutions', 'InstitutionsController@store');
Route::get('/institution/{id?}', [
    'as' => 'institutionShow',
    'uses' => 'InstitutionsController@show'
]);

Route::get('/institutions/{id?}/edit', [
    'uses' => 'InstitutionsController@edit',
//    'middleware' => 'roles',
]);

Route::post('/institutions/{id?}/update', [
    'uses' => 'InstitutionsController@update',
]);
Route::post('/institution/{id?}/delete', 'InstitutionsController@destroy');


//Assign Employee
Route::post('/institutions/{id?}/assign_update', [
    'uses' => 'InstitutionsController@assignUpdate',
    'middleware' => 'roles',
    'roles' => ['manager']
]);


Route::get('/users/{id?}', 'UsersController@show');



//Interaction Routes
Route::get('/interactions', 'InteractionsController@index');
Route::get('/interactions/create', 'InteractionsController@create');
Route::post('/interactions', 'InteractionsController@store');
Route::get('/interaction/{id?}', [
    'as' => 'interactionShow',
    'uses' => 'InteractionsController@show'
]);

Route::get('/interactions/{id?}/edit', [
    'uses' => 'InteractionsController@edit'
]);

Route::post('/interactions/{id?}/update', [
    'uses' => 'InteractionsController@update'
]);

Route::post('/interaction/{id?}/delete', 'InteractionsController@destroy');

//Route::resource('interactions', 'InteractionsController', ['middleware' => 'auth']);


//Deals Routes
Route::get('/deals', 'DealsController@index');
Route::get('/deals/create', 'DealsController@create');
Route::post('/deals', 'DealsController@store');
Route::get('/deal/{id?}', [
    'as' => 'dealShow',
    'uses' => 'DealsController@show'
]);

Route::get('/deals/{id?}/edit', [
    'uses' => 'DealsController@edit'
]);

Route::post('/deals/{id?}/update', [
    'uses' => 'DealsController@update'
]);
Route::post('/deal/{id?}/delete', 'DealsController@destroy');
//Route::resource('deals', 'dealsController', ['middleware' => 'auth']);


//Schedule Routes
//Route::post('/interaction/{id?}/schedule', 'SchedulesController@store');
