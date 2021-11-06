@extends('layouts.main')

@section('content')
                <div class="w-full bg-gray-300 shadow-sm border-b">
                    <div class="w-10/12 h-20 mx-auto flex justify-between items-center text-gray-800">
                        <div class="text-2xl text-gray-700">
                            <a href="/">Laravel Blog</a>
                        </div>
                        <div>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="hover:underline" >Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="w-10/12 mx-auto text-3xl py-4 bg-gray-300">
                        <div class="grid grid-cols-8 gap-2 mx-auto">
                            <div class="card col-span-2 text-gray-700">
                                <div class="ml-8">
                                    Posts
                                </div>
                                <div class="ml-8 my-3 col-span-2">
                                    @if(session('status'))
                                        <div class="" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    My Posts
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @foreach ($posts as $post)
                <div class="w-10/12 mx-auto text-3xl py-4 bg-gray-50">
                    <div class="w-8/12 mx-auto grid grid-cols-8 gap-2 rounded border">
                        <div class="card col-span-8 pl-4  py-2 bg-gray-100">
                            {{ $post->title }}
                        </div>
                        <div class="card-body col-span-7 ml-4 py-2 text-base">
                            {{ $post->content }}
                        </div>
                    </div>
                </div>
            @endforeach  
            
    </div>


@endsection