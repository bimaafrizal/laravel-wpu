<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostModelController;

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
        "active" => "about",
        "email" => "bimaafrizalmalna@gmail.com",
        "image" => "cv_saya.png"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/blog', [PostModelController::class, 'index']);

//halaman single
Route::get('/blog/{post:slug}', [PostModelController::class, 'show']);

// Route::get('/categories/{category:slug}', function (Category $category) {
//     // var_dump($category->posts->load('category', 'author'));
//     // die;
//     return view('blog', [
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' =>  $category->posts->load('category', 'author'),
//     ]);
// });

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('blog', [
//         'title' => "Post by Author: $author->name",
//         'active' => 'author',
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);