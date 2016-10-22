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

/**
 * Web
 */
Route::group(['middleware' => 'web', 'prefix' => 'posts'], function () {

    Route::get('/', [
        'as'   => 'posts.index',
        'uses' => 'PostController@index'
    ]);

    Route::get('{id}', [
        'as'   => 'post.show',
        'uses' => 'PostController@show'
    ]);

});


/**
 * Admin
 */
Route::group(['middleware' => 'admin'], function () {

    /**
     * Group:admin
     */
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', [
            'as' => 'admin.index',
            'uses' => 'AdminHomeController@index'
        ]);

        Route::resource('users', 'AdminUsersController', [
            'names' => [
                'index'  => 'admin.users.index',
                'create' => 'admin.users.create',
                'edit'   => 'admin.users.edit',
            ]
        ]);

        Route::resource('posts', 'AdminPostsController', [
            'names' => [
                'index'  => 'admin.posts.index',
                'create' => 'admin.posts.create',
                'edit'   => 'admin.posts.edit',
            ]
        ]);


        /**
         * Group:comments
         */
        Route::group(['prefix' => 'comments'], function () {

            Route::resource('/', 'PostCommentsController', [
                'names' => [
                    'index'  => 'admin.comments.index',
                    'create' => 'admin.comments.create',
                    'edit'   => 'admin.comments.edit',
                ]
            ]);

            Route::resource('replies', 'CommentRepliesController', [
                'names' => [
                    'index'  => 'admin.comments.replies.index',
                    'create' => 'admin.comments.replies.create',
                    'edit'   => 'admin.comments.replies.edit',
                ]
            ]);

        });

    });

});

//Route::resource('admin/users', ['as' => 'admin.users', 'uses' => 'AdminUsersController']);

/*Route::resource('admin/user', 'AdminUsersController', [
    'as' => 'admin.users'
]);*/

//Route::resource('admin/user', ['as' => 'admin.users'], 'AdminUsersController');

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
