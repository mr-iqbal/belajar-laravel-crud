
@extends('layouts.main')


@section('container')

    <h1 class="text-center mb-3">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <form action="/posts">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search here..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
            <div class="card mb-3">
                @if ($posts[0]->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/'. $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}" class="img-fluid mt-3">
                @endif
                    
                <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        <h6>By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a></h6>
                    </small>
                </p> 
                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <p class="card-text"><small class="text-muted">Last updated {{ $posts[0]->created_at->diffForHumans() }}</small></p>

                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>

                
                </div>
            </div>
    
    
    <div class="row">
        @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-5">
                <div class="card">
                    <div class="position-absolute bg-dark rounded-lg px-4 py-2 " class="text-decoration-none"><a href="/posts?category={{ $post->category->slug }}" class="text-light text-decoration-none">{{ $post->category->name }}</a></div>
                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    @endif
                    <div class="card-body my-3">
                    
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>
                        <small class="text-muted">
                            <h6>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                        </small>
                    </p> 
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
    
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>  

    {{-- @foreach ($posts->skip(1) as $post)
    <article class="mb-5 border-bottom pb-3">
        <h3 class="mt-5">
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
        </h3>

        <h6>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h6>

        <p>{{ $post->excerpt }}</p>


        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read More...</a>
    </article>
  
    @endforeach --}}

@endsection