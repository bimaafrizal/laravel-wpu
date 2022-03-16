@extends('layouts.main')
@section('container')
<h1>Post Category : {{ $category }} </h1>
@foreach ($posts as $post)
<article class="mb-5">
    <h2>
        <a href="/blog/{{ $post->slug }}">
            {{ $post->title }}</h2>
        </a>
    <h5>By: {{ $post->author }}</h5>
    <p>{{ $post->excerpt }}</p>
</article>
@endforeach    
<script src="script.js"></script>
@endsection