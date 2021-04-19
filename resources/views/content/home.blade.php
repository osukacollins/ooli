@extends('main.main')

@section('content')
<div class="lg:w-4/5 flex overflow-scroll">
    <div class="lg:p-3 lg:w-2/3 ">
        <div class="flex p-3">
            <div class="lg:p-3 flex lg:block">
                <img src="{{ asset('./images/user1.png') }}" alt="user" class="object-contain" height="70" width="70">
            </div>

            <form action="{{ route('home') }}" class="p-3 flex lg:block" method="post">
                @csrf
                <textarea name="body" id="" cols="100" rows="1" placeholder="Whats up?"
                    class="w-full rounded-xl p-3 shadow-inner resize-none lg:resize mr-3 lg:m-0" required></textarea>
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
    <div class="p-3 lg:w-1/3 hidden lg:flex lg:flex-col">
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