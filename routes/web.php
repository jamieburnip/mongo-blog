<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'BlogController@index');
Route::get('/blog', 'BlogController@index');

Route::get('/blog/{slug}', 'BlogController@show');

Route::get('/profile/{username}', 'UserController@show');

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/admin/new-post', 'BlogController@create');
    Route::post('/admin/new-post', 'BlogController@store');
});