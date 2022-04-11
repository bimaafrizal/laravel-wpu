{{-- @dd($posts) mirip dengan var dump --}}
@extends('layouts.main')
@section('container')
<h1 class="text-center mb-3"> {{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog" method="GET">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search...." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if ($posts->count())    
<div class="card mb-3">
    <img src="https://source.unsplash.com/1000x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    <div class="card-body text-center">
      <h3 class="card-title "> 
          <a class="text-decoration-none text-dark" href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
        </h3>
      <p> By: <a class="text-decoration-none " href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>  
        in  <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none"> {{ $posts[0]->category->name }} </a> 
    </p>
      <p class="card-text"><small class="text-muted"> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
</div>


<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        {{-- {{ dd($post->author) }} --}}
        <div class="col-md-4 mb-3">
            <div class="card mb-3">
                <img src="https://source.unsplash.com/1000x400/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                <div class="card-body text-center">
                  <h3 class="card-title "> 
                      <a class="text-decoration-none text-dark" href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                    </h3>
                  <p> By: <a class="text-decoration-none " href="/blog?author={{ $post->author->username ?? 'none' }}">{{ $post->author->name ?? 'none' }}</a>  
                    in  <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }} </a> 
                </p>
                  <p class="card-text"><small class="text-muted"> {{ $post->created_at->diffForHumans() }}</small></p>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/blog/{{ $post->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else  
<p class="text-center fs-4">No Post Found.</p>
@endif

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
{{-- @foreach ($posts->skip(1) as $post)
<article class="mb-5 border-bottom pb-3">
    <h2 class="">
        <a class="text-decoration-none" href="/blog/{{ $post->slug }}">
            {{ $post->title }}
        </a>
    </h2>
    <p> By: <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>  
        in  <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }} </a> 
    </p>
    <p> {{ $post->excerpt }} </p>
    <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Read more</a>
</article>
@endforeach    
<script src="script.js"></script> --}}
@endsection

