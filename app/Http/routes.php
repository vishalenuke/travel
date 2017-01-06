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



Route::resource('adminsetting','AdminSettingController' );
Route::get('getsettings','AdminSettingController@getSetting' );
Route::resource('whitelabel','WhiteLabelController' );
Route::get('whitelabel-search','WhiteLabelController@search' );
Route::resource('agency','AgencyController' );
Route::get('agency/{id}/subagents','AgencyController@subAgents' );
Route::get('agency/{id}/pending','AgencyController@pendingShow' );
Route::resource('subagents','SubagentsController' );
Route::post('agency/{id}/approve','AgencyController@approve' );
Route::get('agency/{id}/status','AgencyController@block' );
Route::get('pending/applications','AgencyController@pendingApplications');
Route::get('agency-search','AgencyController@search' );
Route::get('airline-search','AirlineController@search' );
Route::resource('airline','AirlineController' );
Route::get('account/verification/{id}', 'AgencyController@verification');
Route::get('auth/verification/{id}', 'AuthController@verification');
Route::get('/', function () {	
	if(!Auth::check())
		return Redirect::to('auth/login');  
	else
	  return Redirect::to('agency');
});
Route::get('/register', function () {

    return view('auth.register');
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
