<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_Model;
use App\Http\Requests\StorePost_ModelRequest;
use App\Http\Requests\UpdatePost_ModelRequest;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('blog', [
            "title" => "Blog",
            "posts" => Post::all()
        ]);
    }

    public function show($slug)
    {
        return view('single_blog', [
            "title" => "Single Post",
            "posts" => Post::find($slug)
        ]);
    }
}
