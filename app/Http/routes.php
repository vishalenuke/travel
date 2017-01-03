<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::resource('whitelabel','WhiteLabelController' );
Route::resource('whitelabel-search','WhiteLabelController@search' );
Route::resource('agency','AgencyController' );
Route::resource('agency/{id}/subagents','AgencyController@subAgents' );
Route::resource('agency/{id}/approve','AgencyController@approve' );
Route::get('pending/applications','AgencyController@pendingApplications');
Route::get('agency-search','AgencyController@search' );
Route::get('airline-search','AirlineController@search' );
Route::resource('airline','AirlineController' );
Route::get('account/verification/{id}', 'AgencyController@verification');
Route::get('/', function () {	
	return Redirect::to('auth/login');    
});
Route::get('/register', function () {

    return view('auth.register');
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
