{{-- @dd($posts); --}}
@extends('layouts/main')
@section('container')  
<article>
    <h2>{{  $posts["title"] }}</h2>
    <h5>{{ $posts["author"] }}</h5>
    <p>{{ $posts["body"] }}</p>
</article>

<a href="/blog">Back to Blog</a>
@endsection