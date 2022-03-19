{{-- @dd($posts); --}}
@extends('layouts/main')
@section('container')  

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-3">{{  $posts->title }}</h2>
            <h5 class="mb-3">By: <a class="text-decoration-none" href="/authors/{{ $posts->author->username }}">{{ $posts->author->name }}</a>  in  <a class="text-decoration-none" href="/categories/{{ $posts->category->slug }}">{{ $posts->category->name }} </a> </h5>
            <img src="https://source.unsplash.com/1200x400/?{{ $posts->category->name }}" alt="" class="img-fluid">
            <article class="my-3 fs-4">
                {!! $posts->body !!}
            </article>
            <a class="d-block mt-5" href="/blog">Back to Blog</a>
        </div>
    </div>
</div>

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