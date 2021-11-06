@extends('layouts.app')

@section('content')
    <div class="w-full bg-gray-300 shadow-sm border-b">
        <div class="w-10/12 h-20 mx-auto flex justify-between items-center text-gray-800">
            <div class="text-2xl text-gray-700">
                <a href="/">Laravel Blog</a>
            </div>
            <div>
                <form  class="flex gap-8" action="{{ route('logout') }}" method="post">
                    @csrf
                    @auth
                        <a class="hover:underline" href="{{ route('posts.index')}}">My Posts</a>    
                    @endauth
                    <a class="hover:underline" href="/">Home</a>
                    @auth
                        <button class="hover:underline" >Logout</button>
                    @endauth
                    @guest
                        <a class="hover:underline" href="{{ route('login') }}">Login</a>
                        <a class="hover:underline" href="{{ route('register') }}">Register</a>
                    @endguest
                </form>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="text-3xl py-4 bg-gray-100 rounded-b-lg">
            <div class="w-10/12 mx-auto grid grid-cols-8 gap-2">
                
                <div class="ml-8 my-3 col-span-8">    
                    Blog Posts
                </div>
                
                <div class="pl-8 text-lg col-span-4 rounded text-gray-900">
                    <p>Total Posts: <strong class="text-blue-500">{{ $countPosts }}</strong></p>
                </div>
                @auth
                    <div class="pl-8 col-span-8 rounded text-gray-900 mb-4">
                        
                        <a href="{{ route('posts.create') }}" class="py-3 px-6 text-lg bg-blue-600 text-white rounded">New Post</a>
                        
                    </div>
                @endauth
            </div>
        </div>
        
        @foreach ($posts as $post)
                       
                <div class="w-10/12 mx-auto text-3xl py-4 bg-gray-50">
                
                    <div class="w-8/12 mx-auto grid grid-cols-8 gap-2 rounded border">
                        <div class="card col-span-8 pl-4  py-2 bg-gray-100">
                            {{ $post->title }}
                        </div>

                        <div class="card-body col-span-6 ml-4 py-2 text-base">
                            {{ $post->content }}
                        </div>

                        <div class="inline-block col-span-2 text-center mb-2">
                            @can('update', $post)
                                <form class="inline-block" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('posts.edit', $post->id) }}" class="py-2 px-4 text-sm bg-blue-400 text-white rounded">Edit</a>
                                    <button type="submit" class="py-2 px-4 text-sm bg-red-600 text-red-50 rounded">Delete</button>
                                </form>
                            @endcan
                        </div>
                        
                    </div>

                </div>
                     
        @endforeach

    </div>
    <div class="h-9 mb-4">
        {{ $posts->links('pagination::simple-tailwind')}} 
    </div>
@endsection