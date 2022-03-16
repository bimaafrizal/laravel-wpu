@extends('layouts.main')
@section('container')
<h1>Post categories</h1>
@foreach ($categories as $category)
<ul>
    <li>
        <a href="/categories{{ $category->slug }}">
            {{ $category->name }}</h2>
        </a>
    </li>
</ul>

@endforeach    
@endsection