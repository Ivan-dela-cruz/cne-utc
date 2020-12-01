<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/web', function () {
    return view('init.index');
});


Route::get('/admin', function () {
    return view('admin.init.index');
});
Route::get('/organizations', function () {
    return view('admin.organizations.index');
});
///RUTAS DEL PROYECTO
Route::get('/users-list', 'Api\UserController@index');
Route::get('/users-create', 'Api\UserController@create');
Route::post('users-st', 'Api\UserController@store');
Route::patch('users/{id}', 'Api\UserController@update');
Route::get('users/{id}/show', 'Api\UserController@show');
Route::get('users/{id}/edit', 'Api\UserController@edit');
Route::delete('users-dl', 'Api\UserController@destroy');

// RUTA ORGANIZATIONS
Route::get('organizations','Api\OrganizationController@index');
Route::get('organizations/create', 'Api\OrganizationController@create');
Route::post('organizationst', 'Api\OrganizationController@store');
Route::patch('organizations/{id}', 'Api\OrganizationController@update');
Route::get('organizations/{id}/show', 'Api\OrganizationController@show');
Route::get('organizations/{id}/edit', 'Api\OrganizationController@edit');
Route::delete('organizations', 'Api\OrganizationController@destroy');
// RUTA positions
Route::get('positions','Api\PositionController@index');
Route::get('positions-create', 'Api\PositionController@create');
Route::post('positions', 'Api\PositionController@store');
Route::patch('positions/{id}', 'Api\PositionController@update');
Route::get('positions/{id}/show', 'Api\PositionController@show');
Route::get('positions/{id}/edit', 'Api\PositionController@edit');
Route::delete('positions', 'Api\PositionController@destroy');
// RUTA candidates
Route::get('candidates','Api\CandidateController@index');
Route::get('candidates-create', 'Api\CandidateController@create');
Route::post('candidates', 'Api\CandidateController@store');
Route::patch('candidates/{id}', 'Api\CandidateController@update');
Route::get('candidates/{id}/show', 'Api\CandidateController@show');
Route::get('candidates/{id}/edit', 'Api\CandidateController@edit');
Route::delete('candidates', 'Api\CandidateController@destroy');
