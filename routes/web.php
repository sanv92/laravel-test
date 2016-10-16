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


Route::get('admin', 'AdminHomeController@index');
Route::resource('admin/user', 'AdminUsersController');

/**
 * test one to one
 */
Route::get('/one_user', 'TestController@index');
Route::get('/one_rule', 'TestController@indexRole');
/**
 * test one to many
 */
Route::get('/one_to_many_users', 'TestController@one_to_many_users');
Route::get('/one_to_many_roles', 'TestController@one_to_many_roles');


\DB::listen(function($sql) {
    //var_dump($sql);
});

//Route::auth();

//Route::get('/home', ['middleware' => 'role', 'HomeController@index']);

/*Route::get('/home',[
    'middleware' => 'role',
    'uses' => 'HomeController@index',
]);*/

/*
Route::group(['middleware' => 'api'], function () {
    Route::get('/home', 'HomeController@index');
});
*/