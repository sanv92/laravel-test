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

//Route::get('/home', ['middleware' => 'role', 'HomeController@index']);

/*Route::get('/home',[
    'middleware' => 'role',
    'uses' => 'HomeController@index',
]);*/

Route::group(['middleware' => 'api'], function () {
    Route::get('/home', 'HomeController@index');
});