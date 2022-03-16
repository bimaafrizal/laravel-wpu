<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
        "email" => "bimaafrizalmalna@gmail.com",
        "image" => "cv_saya.png"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/blog', [PostModelController::class, 'index']);
//halaman single
Route::get('blog/{post:slug}', [PostModelController::class, 'show']);
