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

Route::get('/', 'HomeController@index')->name('home.index');

//Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
//    Route::get('/admin/', 'AdminPagesController@index');
//    Route::get('/admin/post/new', 'AdminPagesController@new');
//    Route::get('/admin/post/{id}/edit', 'AdminPagesController@edit');
//    Route::get('/admin/post/{id}/delete', 'AdminPagesController@index');
//
//
//    Route::post('/admin/post/store', 'PostApiController@store');
//    Route::get('/admin/api/post/{postId}', 'AdminPagesController@apiGet');
//});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/new-post', 'PostsController@create')->name('post.create');
    Route::post('/new-post', 'PostsController@store')->name('post.store');

    Route::get('/{username}/{slug}/edit', 'PostsController@edit')->name('post.edit');
    Route::post('/{username}/{slug}/edit', 'PostsController@update')->name('post.update');
    Route::post('/{username}/{slug}/quick-publish', 'PostsController@publish')->name('post.quick-publish');

    Route::delete('/post/delete', 'PostsController@destroy')->name('post.delete');
});

Route::get('/{username}/{slug}', 'ProfileController@show')->name('profile.show');
Route::get('/{username}', 'ProfileController@index')->name('profile.index');

