@extends('layouts.main')

@section('container')    
<h1>Ini halaman about</h1>
<h3> {{ $name }} </h3>
<h3> {{ $email }}</h3>
<img src="{{ $image }}" alt="{{ $name }}" width="300">
@endsection
