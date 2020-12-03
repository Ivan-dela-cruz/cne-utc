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
Auth::routes();
Route::get('/', function () {
    return view('web.index');
});

Route::group(['middleware' => ['auth']], function () {


    Route::get('/admin', function () {
        return view('admin.init.index');
    });

    Route::get('/organizations', function () {
        return view('admin.organizations.index');
    });
///RUTAS DEL PROYECTO
    Route::get('/users', 'Api\UserController@index');
    Route::get('/users-create', 'Api\UserController@create');
    Route::post('users-st', 'Api\UserController@store');
    Route::patch('users/{id}', 'Api\UserController@update');
    Route::get('users/{id}/show', 'Api\UserController@show');
    Route::get('users/{id}/edit', 'Api\UserController@edit');
    Route::delete('users-dl', 'Api\UserController@destroy');

// RUTA ORGANIZATIONS
    Route::get('organizations-list', 'Api\OrganizationController@index');
    Route::get('organizations/create', 'Api\OrganizationController@create');
    Route::post('organizationst', 'Api\OrganizationController@store');
    Route::put('organizations/{id}', 'Api\OrganizationController@update');
    Route::get('organizations/{id}/show', 'Api\OrganizationController@show');
    Route::get('organizations/{id}/edit', 'Api\OrganizationController@edit');
    Route::delete('organizations-delete', 'Api\OrganizationController@destroy');
// RUTA positions
    Route::get('positions-list', 'Api\PositionController@index');
    Route::get('positions-create', 'Api\PositionController@create');
    Route::post('positionst', 'Api\PositionController@store');
    Route::patch('positions/{id}', 'Api\PositionController@update');
    Route::get('positions/{id}/show', 'Api\PositionController@show');
    Route::get('positions/{id}/edit', 'Api\PositionController@edit');
    Route::delete('positions-delete', 'Api\PositionController@destroy');
// RUTA candidates
    Route::get('candidates-list', 'Api\CandidateController@index');
    Route::get('candidates-create', 'Api\CandidateController@create');
    Route::post('candidatest', 'Api\CandidateController@store');
    Route::patch('candidates/{id}', 'Api\CandidateController@update');
    Route::get('candidates/{id}/show', 'Api\CandidateController@show');
    Route::get('candidates/{id}/edit', 'Api\CandidateController@edit');
    Route::delete('candidates-delete', 'Api\CandidateController@destroy');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('organizations', 'Api\OrganizationController');

});


















Route::resource('roles', 'Api\RoleController');
