<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('/posts', 'PostsController');
Route::get('/posts','PostsController@index');
Route::post('/posts','PostsController@store');
Route::get('/posts/create','PostsController@create');
Route::get('/posts/{post}/edit','PostsController@edit');
Route::put('/posts/{post}','PostsController@update');
Route::delete('/posts/{post}','PostsController@destroy');
