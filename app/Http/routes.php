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

    //DateController
    Route::get('dates',                 ['as' => 'dates.index', 'uses' => 'DatesController@index']);
    Route::get('/',                     ['as' => 'index', 'uses' => 'DatesController@index']);
    Route::post('dates',                ['as' => 'dates.store','uses' => 'DatesController@store']);
    Route::delete('dates/{id}',         ['as' => 'dates.destroy','uses' => 'DatesController@destroy']);

    //CommentController
    Route::post('comments',             ['as' => 'comments.store','uses' => 'CommentsController@store']);
    Route::delete('comments/{id}',      ['as' => 'comments.destroy','uses' => 'CommentsController@destroy']);

    //AvatarsController
    Route::get('avatars',                ['as' => 'avatars.index', 'uses' => 'AvatarsController@index']);
    Route::get('avatars/{filename}',     ['as' => 'avatars.store','uses' => 'AvatarsController@store']);
    Route::post('avatars',               ['as' => 'avatars.upload','uses' => 'AvatarsController@upload']);

});

//to protect a single route we can use:
//Route::get('dates', ['middleware' => 'auth', 'uses' => 'DatesController@index']);
