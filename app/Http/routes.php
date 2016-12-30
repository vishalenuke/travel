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

// Route::get('dash/login', 'AuthController@getLogin');
// Route::post('dash/login', 'AuthController@postLogin');
 
// Route::get('dash/register', 'AuthController@getRegister');
// Route::post('dash/register', 'AuthController@postRegister');
 
 //Route::get('logout', 'AuthController@getLogout');


Route::resource('whitelabel','WhiteLabelController' );
Route::resource('whitelabel-search','WhiteLabelController@search' );
Route::resource('agency','AgencyController' );
Route::resource('agency/{id}/subagents','AgencyController@subAgents' );
Route::get('pending/applications','AgencyController@pendingApplications');
Route::get('agency-search','AgencyController@search' );
Route::get('airline-search','AirlineController@search' );
Route::resource('airline','AirlineController' );
//Route::resource('city','CityController' );
//Route::resource('user','UserController' );
Route::get('/', function () {
	//Auth::logout();	
	return Redirect::to('/auth/login');
    //return view('auth.login');
});
Route::get('/register', function () {

    return view('auth.register');
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
