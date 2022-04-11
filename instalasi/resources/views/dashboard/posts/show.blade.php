@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            
            <h2 class="mb-3">{{  $posts->title }}</h2>
            <a href="/dashboard/posts" class="btn btn-success"> <span data-feather="arrow-left" ></span> Back to all my posts</a>
            <a href="/dashboard/posts/{{ $posts->slug }}/edit" class="btn btn-warning"> <span data-feather="edit" ></span> Edit</a>
            <form action="/dashboard/posts/{{ $posts->slug }}" method="POST" class="d-inline">
                @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
                @csrf
            </form>
            {{-- <a href="" class="btn btn-danger"> <span data-feather="x-circle" ></span> Delete</a> --}}
            @if ($posts->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/'. $posts->image) }}" alt="" class="img-fluid mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ $posts->category->name }}" alt="{{ $posts->category->name }}" class="img-fluid mt-3">
            @endif
            <article class="my-3 fs-4">
                {!! $posts->body !!}
            </article>
            <a class="d-block mt-5" href="/blog">Back to Blog</a>
        </div>
    </div>
</div>
@endsection