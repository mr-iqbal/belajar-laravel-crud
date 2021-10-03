<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\User;




Route::get('/', function () {

    return view('home',[

        "title" => "Home",
        "active"=> "home"
    ]);
});

Route::get('/about', function () {
    return view('about',[

        "title" => "About",
        "active"=> "about",
        "name"  => "Iqbal Rasetio",
        "email" => "iqbalrasetio16@gmail.com",
        "image" => "img/pict-1.jpg",
        
    ]);
});

//menampilkan seluruh posts
Route::get('/posts','PostController@index');

//menampilkan single post / detail post
Route::get('posts/{post:slug}', 'PostController@show');

//menuju ke halaman category
Route::get('/categories',function(){

    return view('categories',[
        
        'title'         => 'Post Categories',
        "active"        => "categories",
        'categories'    => Category::all()   
    ]);
});

//menampilkan seluruh category
Route::get('/categories/{category:slug}', function(Category $category) {

    return view('posts',[
        
        'title'     => "Post By Category : $category->name",
        "active"    => "categories",
        'posts'     => $category->posts->load('category','author'),
        
    ]);
});

//menampilkan seluruh author
Route::get('/authors/{author:username}',function(User $author){

    return view('posts',[
        
        'title'         => "Post By Author : $author->name",
        'active'        => "posts",
        'posts'         => $author->posts->load('category','author'),

   
    ]);
});

Route::get('/login','LoginController@index')->name('login')->middleware('guest');
Route::post('/login','LoginController@authenticate');
Route::post('/logout','LoginController@logout');


Route::get('/register','RegisterController@index')->middleware('guest');
Route::post('/register','RegisterController@store');

Route::get('/dashboard',function(){
    
    return view('dashboard.index');

})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', 'DashboardPostController@checkSlug')->middleware('auth');
Route::resource('/dashboard/posts', 'DashboardPostController')->middleware('auth');
Route::resource('/dashboard/categories', 'AdminCategoryController')->except('show')->middleware('admin');
