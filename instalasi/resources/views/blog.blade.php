{{-- @dd($posts) mirip dengan var dump --}}
@extends('layouts.main')
@section('container')
<h1>Ini Halaman Blog</h1>
@foreach ($posts as $post)
<article class="mb-5 border-bottom pb-3">
    <h2 class="">
        <a class="text-decoration-none" href="/blog/{{ $post->slug }}">
            {{ $post->title }}
        </a>
    </h2>
    <p> By: <a class="text-decoration-none" href="#">{{ $post->user->name }}</a>  in  <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }} </a> </p>
    <p>{{ $post->excerpt }}</p>
    <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Read more....</a>
</article>
@endforeach    
<script src="script.js"></script>
@endsection

