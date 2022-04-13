<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post_Model;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post_Model::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->file('image')->store('post-images');
        // var_dump($request['slug']);
        // die;
        $validatdedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:post__models',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);
        $validatdedData['image'] = $request->file('image')->store('post-images');
        // if ($request->file('images')) {
        // }

        $validatdedData['user_id'] = auth()->user()->id;
        $validatdedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '....');

        Post_Model::create($validatdedData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added');
        //return $validatdedData;
        // echo $validatdedData;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post_Model $post)
    {
        //return $post;
        return view('dashboard.posts.show', [
            'posts' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_Model $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post_Model $post)
    {

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:post__models';
        }

        $validatdedData = $request->validate($rules);

        if($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        $validatdedData['image'] = $request->file('image')->store('post-images');
        
        
        $validatdedData['user_id'] = auth()->user()->id;
        $validatdedData['excerpt'] = Str::limit(strip_tags($request->body), 100, '....');

        Post_Model::where('id', $post->id)->update($validatdedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_Model $post)
    {
        Post_Model::destroy($post->id);
        if($post->image) {
            Storage::delete($post->image);
        }
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post_Model::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
