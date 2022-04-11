<?php

namespace App\Http\Controllers;

use App\Models\Post_Model;
use App\Http\Requests\StorePost_ModelRequest;
use App\Http\Requests\UpdatePost_ModelRequest;
use App\Models\Category;
use App\Models\User;

class PostModelController extends Controller
{

    public function index()
    {
        // dd(request('search'));
        // $posts = Post_Model::latest();
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by: ' . $author->name;
        }

        //return User::all();

        return view('blog', [
            "title" => "All Posts" . $title,
            "active" => "blog",
            //"posts" => Post_Model::all()
            "posts" => Post_Model::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post_Model $post)
    {
        return view('single_blog', [
            "title" => "Single Post",
            "active" => "blog",
            "posts" => $post
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePost_ModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost_ModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post_Model  $post_Model
     * @return \Illuminate\Http\Response
     */
    // public function show(Post_Model $post_Model)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post_Model  $post_Model
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_Model $post_Model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePost_ModelRequest  $request
     * @param  \App\Models\Post_Model  $post_Model
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost_ModelRequest $request, Post_Model $post_Model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post_Model  $post_Model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_Model $post_Model)
    {
        //
    }
}
