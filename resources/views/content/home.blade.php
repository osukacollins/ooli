@extends('main.main')

@section('content')
<div class="w-4/5 flex">
    <div class="p-3 w-2/3">
        <div class="flex p-3">
            <div class="p-3">
                <img src="{{ asset('./images/user1.png') }}" alt="" height="70" width="70">
            </div>

            <form action="{{ route('home') }}" class="p-3" method="post">
                @csrf
                <textarea name="body" id="" cols="100" rows="3" placeholder="Whats up?"
                    class="w-full rounded-xl p-3 shadow-inner" required></textarea>
                <br>
                <button class="border-2 border-blue-400 text-blue-400 rounded-xl p-2" type="submit">
                    Post
                </button>
            </form>
        </div>
        @if ($posts->count())
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach

        @else
        <div class="text-gray-400 text-lg ">
            there are no post
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