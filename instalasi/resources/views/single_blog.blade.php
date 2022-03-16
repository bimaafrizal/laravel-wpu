{{-- @dd($posts); --}}
@extends('layouts/main')
@section('container')  
<h2>{{  $posts->title }}</h2>
<h5>{{ $posts->author }}</h5>
{!! $posts->body !!}

<br>
<a href="/blog">Back to Blog</a>
@endsection
Post_Model::create(['title' => "Judul Kedua", 'slug'=> 'judul-kedua', 'excerpt' =>'Post Kedua','body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est. Qui, ratione perferendis. Officia, cupiditate omnis? Omnis maiores aperiam necessitatibus, quibusdam tempore voluptatum?'])