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
Route::get('/', 'Web\HomeController@index');

Route::group(['middleware' => ['auth']], function () {


    Route::get('/admin', function () {
        return view('admin.init.index');
    })->name('admin');

    Route::get('/organizations', function () {
        return view('admin.organizations.index');
    });


    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('dashboard/organizations', 'Api\OrganizationController');
    Route::resource('dashboard/candidates', 'Api\CandidateController');
    Route::resource('dashboard/positions', 'Api\PositionController');
    Route::resource('dashboard/roles', 'Api\RoleController');
    Route::resource('dashboard/users', 'Api\UserController');
    Route::resource('dashboard/enclosures', 'Api\EnclosureController');


});
Route::resource('dashboard/locations', 'Api\LocationController');



