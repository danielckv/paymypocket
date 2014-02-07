<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('pockets', 'PocketsController');
Route::resource('activities', 'ActivitiesController');
Route::resource('users', 'UsersController');

Route::post('users/create', array('as'=>'create','uses' => 'UsersController@create'));

Route::post('pockets/create', array('as'=>'create','uses' => 'PocketsController@create'));
Route::post('pockets/connect', array('as'=>'connect','uses' => 'PocketsController@connect'));

Route::post('activities/create', array('as'=>'create','uses' => 'ActivitiesController@create'));
Route::post('activities/get', array('as'=>'get','uses' => 'ActivitiesController@get'));
Route::post('activities/getPoints', array('as'=>'getPoints','uses' => 'ActivitiesController@getPoints'));

Route::get('/', function()
{
	return View::make('hello');
});