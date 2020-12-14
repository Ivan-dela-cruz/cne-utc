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
Route::get('/', 'Web\HomeController@index')->name('inicio');
Route::get('maps', 'Web\HomeController@getMapTemplate')->name('maps');
Route::group(['middleware' => ['auth']], function () {
   
    
    Route::get('/admin', function () {

        return view('admin.init.index');
    })->name('admin');


    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['permission:create_user|update_user|destroy_user|read_user']], function () {
        Route::resource('dashboard/users', 'Api\UserController');
    });
    Route::group(['middleware' => ['permission:create_organization|update_organization|destroy_organization|read_organization']], function () {
        Route::resource('dashboard/organizations', 'Api\OrganizationController');
    });
    Route::group(['middleware' => ['permission:create_candidate|update_candidate|destroy_candidate|read_candidate']], function () {
        Route::resource('dashboard/candidates', 'Api\CandidateController');
    });
    Route::group(['middleware' => ['permission:create_position|update_position|destroy_position|read_position']], function () {
        Route::resource('dashboard/positions', 'Api\PositionController');
    });
    Route::group(['middleware' => ['permission:create_rol|update_rol|destroy_rol|read_rol']], function () {
        Route::resource('dashboard/roles', 'Api\RoleController');
    });
    Route::group(['middleware' => ['permission:create_enclosure|update_enclosure|destroy_enclosure|read_enclosure']], function () {
        Route::resource('dashboard/enclosures', 'Api\EnclosureController');
    });
    Route::group(['middleware' => ['permission:create_location|update_organization|destroy_organization|read_organization']], function () {
        Route::resource('dashboard/locations', 'Api\LocationController');
    });
    
});
///PERMISO PARA EL USUARIO DE REGISTRAR LOS RESULTADOS DE LOS VOTOS/////
Route::group(['middleware' => ['auth','role:Votante']], function () {
    Route::post('store-president','Web\HomeController@storeVotes')->name('store-president');
    Route::get('redirect-route/{path}','Web\HomeController@redirectUrlSelect')->name('redirect-route');

    Route::get('president', 'Web\HomeController@getSelectTemplate')->name('president');
    
    Route::get('national', 'Web\HomeController@getSelectTemplateNational')->name('national');

    Route::get('province', 'Web\HomeController@getSelectTemplateProvince')->name('province');
    
    Route::get('parlament', 'Web\HomeController@getSelectTemplateParlament')->name('parlament');

    Route::get('/organizations', function () {
        return view('admin.organizations.index');
    });
    
    Route::get('select-parishes/{id}', 'Web\HomeController@getSelectParish');
    Route::get('select-enclosures/{id}', 'Web\HomeController@getSelectEnclosure');
    Route::get('select-gender/{id}/{gender}', 'Web\HomeController@getMeeting');
    
});
Route::resource('dashboard/votes', 'Api\VoteController');

Route::get('results','Web\ResultController@index')->name('results');


