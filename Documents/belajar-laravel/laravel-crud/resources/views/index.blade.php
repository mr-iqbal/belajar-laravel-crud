@extends('main')

@section('content')
    <a href="/posts/create">
        <button href="" class="bg-blue-600 text-white font-semibold text-md px-5 py-2 rounded">Add New Post</button>
    </a>
    @foreach ($posts as $post)
        <article class="flex flex-colmb-5 mt-8 border-b-2 border-gray-300">
            <div>
                <h1 class="text-2xl font-semibold text-indigo-600">{{ $post->title }}</h1>
                <p class="text-sm mb-4">{{ $post->content }}</p>
            </div>
            <div class="ml-5 flex justify-items-end space-x-3">
                <a href="/posts/{{ $post->id }}/edit">
                    <button class="bg-indigo-500 text-white rounded px-4 py-2">Edit</button>
                </a>
                <form method="POST" action="/posts/{{ $post->id }}" id="form-delete">
                    @csrf
                    @method('DELETE')
                        <button type="button" id="delete" class="bg-red-500 text-white rounded px-4 py-2">Delete</button>
                </form>
            </div>
        </article>
    @endforeach
@endsection