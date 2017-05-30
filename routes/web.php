<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
  	Route::resource('/contacts', 'ContactsController');
  	Route::get('/contacts/{input}/search', 'ContactsController@search');
    Route::get('/contacts/group/{group}', 'GroupsController@index');
  	//Google 2FA routes
  	Route::get('/2fa/enable', 'TwoFAController@enable');
	Route::get('/2fa/disable', 'TwoFAController@disable');
});

Route::get('/2fa/validate', 'TwoFAController@getValidateToken');
Route::post('/2fa/validate', 'TwoFAController@postValidateToken')->middleware('throttle:3');

Route::get('/locale/{locale}', 'LocaleController@index');


