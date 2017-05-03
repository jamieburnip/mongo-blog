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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/new-post', 'BlogController@create');
    Route::post('/new-post', 'BlogController@store');
    Route::delete('/post/{id}/delete', 'BlogController@delete')->name('post.delete');
});

Route::get('/{username}/{slug}', 'BlogController@show');
Route::get('/{username}', 'ProfileController@show');
