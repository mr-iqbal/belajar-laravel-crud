<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title"     => "Judul Post Pertama",
            "slug"      => "judul-post-pertama",
            "author"    => "Iqbal Rasetio",
            "body"      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus numquam dolorem, repellat eligendi quo porro sint quam, exercitationem ea libero aliquid fugiat voluptatem facilis ipsam provident, inventore dolore saepe nesciunt expedita commodi velit. Officia error, cumque nesciunt saepe consequuntur, pariatur excepturi beatae non deserunt in, deleniti ea animi adipisci ipsa eveniet et minima dolorum fugit unde magnam! Quibusdam pariatur quaerat error obcaecati recusandae iusto magnam? Iusto, commodi officia doloremque non quam minima? Perferendis pariatur corrupti libero debitis tempore fuga quos."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Fikri Ilhamsyah",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus numquam dolorem, repellat eligendi quo porro sint quam, exercitationem ea libero aliquid fugiat voluptatem facilis ipsam provident, inventore dolore saepe nesciunt expedita commodi velit. Officia error, cumque nesciunt saepe consequuntur, pariatur excepturi beatae non deserunt in, deleniti ea animi adipisci ipsa eveniet et minima dolorum fugit unde magnam! Quibusdam pariatur quaerat error obcaecati recusandae iusto magnam? Iusto, commodi officia doloremque non quam minima? Perferendis pariatur corrupti libero debitis tempore fuga quos."
        ]
    ];

    public static function all() {

        return collect(self::$blog_posts);
        
    }

    public static function find($slug) {
        
        $posts = static::all();
    
        return $posts->firstWhere('slug',$slug);   
    }
}
