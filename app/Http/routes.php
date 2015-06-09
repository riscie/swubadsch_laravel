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
    Route::get('dates',                 ['as' => 'dates.show', 'uses' => 'DatesController@index']);
    Route::get('/',                     ['as' => 'index', 'uses' => 'DatesController@index']);
    Route::post('dates',                ['as' => 'dates.store','uses' => 'DatesController@store']);
    Route::delete('dates/{dates}',      ['as' => 'dates.destroy','uses' => 'DatesController@destroy']);

    //CommentController
    Route::post('comments',                ['as' => 'comments.store','uses' => 'CommentsController@store']);


  //  Route::resource('dates', 'DatesController');
   // Route::resource('comments', 'CommentsController');
   // Route::resource('/', 'DatesController');
});

//to protect a single route we can use:
//Route::get('dates', ['middleware' => 'auth', 'uses' => 'DatesController@index']);
