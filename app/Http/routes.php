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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::controller('/peaks','PeakController');

Route::controller('/users','UserController');

Route::controller('/hike','HikeController');

if(App::environment('local')) {
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
};