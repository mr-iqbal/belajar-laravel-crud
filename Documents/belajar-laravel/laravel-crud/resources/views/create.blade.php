@extends('main')

@section('content')
    <form method="POST" action="/posts">
        @csrf
        <div class="mb-4">
            <label class="font-bold text-md text-gray-800" for="title" >Title :</label>
            <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline none focus:border-gray-400 focus:ring-0" id="title"  name="title">
        </div>

        <div class="mb-4">
            <label class="font-bold text-md text-gray-800" for="content" >Content :</label>
            <textarea class="h-16 bg-white border border-gray-300 rounded py-2 px-3 mr-4 w-full text-gray-600 text-sm focus:outline none focus:border-gray-400 focus:ring-0" id="content" name="content"></textarea>
        </div>

        <button class="bg-blue-600 text-white font-semibold px-5 py-2 rounded shadow-md hover:shadow-lg hover:underline">Create New Post</button>
    </form>
@endsection