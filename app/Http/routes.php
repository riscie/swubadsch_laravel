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

//Everyone can access the auth-routes
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Only authenticated users can access these routes
Route::group(array('middleware' => 'auth'), function() {
    Route::resource('dates', 'DatesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('/', 'DatesController');
});

//to protect a single route we can use:
//Route::get('dates', ['middleware' => 'auth', 'uses' => 'DatesController@index']);
