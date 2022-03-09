<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //
    public function index() {
        return view('blog', [
            "title" => "Blog",
            "posts" => Post::all()
        ]);
    }

    public function show($slug) {
        return view('single_blog', [
            "title" => "Single Post",
            "posts" => Post::find($slug)
        ]);
    }
}
