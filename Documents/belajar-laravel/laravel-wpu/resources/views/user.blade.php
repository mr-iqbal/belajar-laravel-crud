{{--     
    @extends('layouts.main')


    @section('container')
        
        <h1 class="">Post Categories</h1>


        @foreach ($user as $user)

            <ul class="">
                <li>
                    <h2><a href="/user/{{ $user->name }}">{{ $user->name }}</a></h2>
                </li>
            </ul>
        
        @endforeach

        <a href="/posts" class="mt-5">Back to posts</a>


    @endsection      --}}