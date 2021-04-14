@extends('main.main')

@section('content')
<div class="w-4/5 flex">
    <div class="p-3 w-2/3">
        <div class="rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="flex flex-col w-full">
                <div class="p-3 justify-center relative ">

                    <img src="{{ asset('./images/image.png') }}" alt="">
                    <div class="absolute bottom-80 left-10 p-3" style="bottom: 80px;">
                        <img src="{{ asset('./images/user1.png') }}" alt="" height="100" width="100">
                    </div>
                </div>
                <div class="p-3 flex justify-between">
                    <p class="text-gray-400">
                        Username: {{ $user->username }}
                    </p>
                    <a href="#" class="text-blue-400">
                        Change
                    </a>
                </div>
                <div class="p-3 flex justify-between">
                    <p class="text-gray-400">
                        Community: {{ $user->community->community_name }}
                    </p>
                    <a href="#" class="text-blue-400">
                        Change
                    </a>
                </div>
                <div class="p-3 flex justify-between">
                    <p class="text-gray-400">
                        Email: {{ $user->email }}
                    </p>
                </div>
            </div>

        </div>

        <p class="text-gray-400 text-xl">
            @if ($user->id == auth()->user()->id)
            My posts
            @else
            Posts
            @endif
        </p>
        @if (!empty($posts))
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach
        @else
        <div class="p-3 flex flex-col">
            <div class="container">
                <p class="text-gray-400 text-center text-2xl font-light">There are no post in this community</p>
            </div>

        </div>
        @endif

    </div>
    <div class="p-3 w-1/3 flex flex-col">
        <div class="text-gray-400 p-3">
            <p class="text-3xl">Trending communities</p>
            <div class="font-light p-3">
                <ul>
                    <li class="px-3">Community 1</li>
                    <li class="px-3">Community 2</li>
                    <li class="px-3">Community 3</li>
                </ul>
            </div>
        </div>
        <div class="text-gray-400 p-3">
            <p class="text-3xl">Trending posts</p>
            <div class="font-light p-3">
                <ul>
                    <li class="px-3">post 1</li>
                    <li class="px-3">post 2</li>
                    <li class="px-3">post 3</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection