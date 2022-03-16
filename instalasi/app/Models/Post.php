<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Bima",
            "body" => "  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error iusto dolorem ratione commodi possimus neque cupiditate laboriosam ipsum asperiores, earum perspiciatis illum rem voluptatum accusamus maiores, ad quibusdam quos nisi!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Afrizal",
            "body" => "  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error 
            iusto dolorem ratione commodi possimus 
            neque cupiditate laboriosam ipsum asperiores, 
            earum perspiciatis illum rem voluptatum accusamus 
            maiores, ad quibusdam quos nisi!"
        ]
    ];
    public static function all()
    {
        return collect(self::$blog_posts);
        //colection adalah pembungkus array agar bisa menjalankan banyak function
    }

    public static function find($slug)
    {
        $blog_posts = static::all();
        // $new_post = [];
        // foreach ($blog_posts as $post) {
        //     if ($post["slug"] == $slug) {
        //         $new_post = $post;
        //     }
        // }
        return $blog_posts->firstWhere('slug', $slug);
    }
}
