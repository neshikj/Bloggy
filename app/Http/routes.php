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

Route::get('/', 'PostsController@index');
Route::get('/post/create', 'PostsController@create');
Route::get('/post/{id}', 'PostsController@show');
Route::post('/post/create', 'PostsController@store');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'api/v1'], function()
{
    Route::resource('posts', 'ApiPostsController');
});
