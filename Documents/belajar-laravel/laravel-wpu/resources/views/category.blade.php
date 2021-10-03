
@extends('layouts.main')


@section('container')
    
    <h1 class="">Post Category : {{ $category }}</h1>


    @foreach ($posts as $post)
    
    <article class="mb-5">
        <h3 class="mt-5">
            <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
        </h3>
        <h6>By. <a href="#" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h6>
        <p>{{ $post->excerpt }}</p>

    </article>
    
    @endforeach
    <a href="/posts">Back to Posts</a>

@endsection     