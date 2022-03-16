{{-- @dd($posts); --}}
@extends('layouts/main')
@section('container')  
<h2>{{  $posts->title }}</h2>
<h5>{{ $posts->author }} in  <a href="/categories/{{ $posts->category->slug }}">{{ $posts->category->name }} </a> </h5>
{!! $posts->body !!}

<br>
<a href="/blog">Back to Blog</a>
@endsection
{{-- Post_Model::create([
    'title' => "Judul Ke Tiga", 
    'category_id' => 3,
    'slug'=> 'judul-ke-tiga', 
    'excerpt' =>'Post Ketiga',
    'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est. Qui, ratione perferendis. Officia, cupiditate omnis? Omnis maiores aperiam necessitatibus, quibusdam tempore voluptatum?</p>'
])

Category::create([
    'name' => 'Web Desain', 
    'slug' => 'web-desain'
]) --}}