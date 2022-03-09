<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Bima Afrizal",
        "email" => "bimaafrizalmalna@gmail.com",
        "image" => "cv_saya.png"
    ]);
});


Route::get('/blog', function () {
    $blog_posts = [
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
    return view('blog', [
        "title" => "Blog",
        "posts" => $blog_posts
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

//halaman single
Route::get('blog/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Bima",
            "body" => "  Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            Error iusto dolorem ratione commodi possimus neque cupiditate laboriosam ipsum asperiores, 
            earum perspiciatis illum rem voluptatum accusamus maiores, ad quibusdam quos nisi!"
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

    $new_post = [];
    foreach ($blog_posts as $post) {
        if ($post["slug"] == $slug) {
            $new_post = $post;
        }
    }
    return view('single_blog', [
        "title" => "Single Post",
        "posts" => $new_post
    ]);
});
