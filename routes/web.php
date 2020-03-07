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

Route::get('/', 'BlogController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware'=>'auth'],function(){
    Route::prefix('blogs')->group(function(){
        // related to blogs
        Route::get('/', 'BlogController@showAll')->name('blog.all');
        Route::get('/create', 'BlogController@create')->name('blog.create');
        Route::post('/', 'BlogController@store')->name('blog.store');
        Route::get('/{blog}', 'BlogController@show')->name('blog.single');
        Route::get('/{blog}/edit', 'BlogController@edit')->name('blog.edit');
        Route::put('/{blog}', 'BlogController@update')->name('blog.update');
        Route::get('/{blog}/delete', 'BlogController@destroy')->name('blog.delete');
        // related to comments 
        Route::post('/{blog}/comment/store' ,'CommentController@store')->name('comment.store');
    });
});

Route::get('/comment/{comment}' ,'CommentController@destroy')->name('comment.delete');




