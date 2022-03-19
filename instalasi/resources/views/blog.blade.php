{{-- @dd($posts) mirip dengan var dump --}}
@extends('layouts.main')
@section('container')
<h1 class="text-center"> {{ $title }}</h1>

@if ($posts->count())    
<div class="card mb-3">
    <img src="https://source.unsplash.com/1000x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    <div class="card-body text-center">
      <h3 class="card-title "> 
          <a class="text-decoration-none text-dark" href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
        </h3>
      <p> By: <a class="text-decoration-none " href="/authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>  
        in  <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none"> {{ $posts[0]->category->name }} </a> 
    </p>
      <p class="card-text"><small class="text-muted"> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
</div>
@else  
<p class="text-center fs-4">No Post Found.</p>
@endif

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                    <a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                </div>
                <img src="https://source.unsplash.com/500x500/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-decoration-none" href="/blog/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h5>
                    <small class="text-muted">
                        <p> By: <a class="text-decoration-none " href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a></p>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                    <p class="card-text"> {{ $post->excerpt }} </p>
                    <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
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

