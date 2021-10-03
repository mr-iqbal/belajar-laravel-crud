<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
       
        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category;
        }
        
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author;
        }

        return view('posts',[

            "title"     => "All Posts",
            "active"    => "posts",
            "posts"     => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
            
        ]);
    }

    public function show(Post $post) {

        return view('post',[

            "title" => "Single Post",
            "active"    => "posts",
            "post"  => $post
            
        ]);
    }
}
