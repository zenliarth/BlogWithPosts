@extends('layouts.main')

@section('content')
    <div class="w-full bg-gray-300 shadow-sm border-b">
        <div class="w-10/12 h-20 mx-auto flex justify-between items-center text-gray-800">
            <div class="text-2xl text-gray-700">
                <a href="/">Laravel Blog</a>
            </div>
            <div class="flex gap-4">
                <a class="hover:underline" href="/">Home</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="hover:underline" >Logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="text-3xl py-4 bg-gray-100 rounded-b-lg">
            <div class="w-10/12 mx-auto grid grid-cols-8 gap-2">
                <div class="ml-8 font-bold my-3 col-span-8">    
                    Edit Post
                </div>
            </div>
        </div>
    </div>
    <div class="w-full pl-8 col-span-8 rounded text-gray-900">
        <div class="w-10/12 mx-auto grid grid-cols justify-center items-center pt-4">
        @if ($errors->any())
            <div class="bg-red-400 text-red-900 p-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form class="py-4 flex flex-col" action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
                <label class="py-2 text-lg" for="title">Post title</label>
                <input class="rounded text-gray-600" type="text" name="title" id="title" value="{{ $post->title }}">
                <label class="py-2 text-lg" for="content">Content</label>
                <textarea class="rounded text-lg text-gray-600" name="content" id="content" cols="60" rows="10" value="{{ old('content') }}">{{ $post->content }}</textarea>
                <button type="submit" class="mt-4 py-2 px-4 text-lg bg-blue-600 text-white rounded">Save Post</button>
            </form>

        </div>
    </div>