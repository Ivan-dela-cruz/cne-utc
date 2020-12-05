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

// RUTA positions

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('dashboard/organizations', 'Api\OrganizationController');
    Route::resource('dashboard/candidates', 'Api\CandidateController');
    Route::resource('dashboard/positions', 'Api\PositionController');


});


Route::resource('roles', 'Api\RoleController');
