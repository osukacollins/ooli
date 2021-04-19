@extends('main.main')

@section('content')
<div class="lg:w-4/5 lg:flex overflow-y-scroll">
    <div class="lg:p-3 lg:w-2/3">
        <div class="lg:hidden relative">
            <div class="sticky bg-gray-800 absolute -inset-0 flex items-center">
                <div class="p-1 w-12 ">
                    <img src="{{ asset('./images/user1.png') }}" alt="user" class="object-contain" height="70"
                        width="70">
                </div>

                <form action="{{ route('search') }}" class="p-1 w-full flex items-center" method="get">

                    <input type="text" name="search" id="" class="rounded-xl shadow-inner p-2 text-gray-400 w-4/5"
                        placeholder="Search for something">
                    <span class="p-1">
                        <button class="border-gray-400 rounded-xl p-2 text-gray-400 border-2">Search</button>
                    </span>
                </form>
            </div>
        </div>
        {{-- users --}}
        @if(!empty($users)&&!empty($users_else)&&!empty($communities))
        @if($users->count())
        @foreach ($users as $user)
        <div class="rounded flex bg-gray-600 shadow-lg my-5 p-3">
            <div class="flex p3">
                <img src="{{ asset('./images/image.png') }}" alt="" height="20" width="20">
                <div class="text-gray-400 px-3">
                    <a href="{{ route('profile', $user->username) }}" class="font-semibold">
                        {{ $user->username }}
                    </a>
                    <a href="{{ route('community.show', $user->community_id) }}">
                        {{ '@' }}{{ $user->community_name }}
                    </a>
                </div>
            </div>
        </div>

        @endforeach

        @else
        @if ($users_else->count())
        <p class="text-gray-400">There are no such users. Here are other similar users</p>
        @foreach ($users_else as $user_else)
        <div class="rounded flex bg-gray-600 shadow-lg my-5 p-3">
            <div class="flex p3">
                <img src="{{ asset('./images/image.png') }}" alt="" height="20" width="20">
                <div class="text-gray-400 px-3">
                    <a href="{{ route('profile', $user_else->username) }}" class="font-semibold">
                        {{ $user_else->username }}
                    </a>
                    <a href="{{ route('community.show', $user_else->community_id) }}">
                        {{ '@' }}{{ $user_else->community_name }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach

        @else
        <div class="container">
            <p class="text-gray-400 text-center text-2xl font-light">There are such users</p>
        </div>
        @endif
        @endif
        {{-- communities --}}
        @if ($communities->count())
        @foreach ($communities as $community)
        <div class="rounded flex justify-between bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="flex p-3">
                <img src="{{ asset('./images/image.png') }}" alt="" height="20" width="20">
                <a class="text-gray-400 px-3 font-semibold hover:text-blue-400"
                    href="{{ route('community.show', $community->id) }}">{{ $community->community_name }}</a>
            </div>
            <div class="">
                <div class="flex">
                    <div class="flex p-3">
                        <div class="px-3">
                            <img src="{{ asset('./images/group.png') }}" alt="" height="30" width="30" title="Members">
                        </div>

                        <p class="text-gray-400">{{ $community->users()->count() }}</p>
                    </div>
                    <div class="flex p-3">
                        <div class="px-3">
                            <img src="{{ asset('./images/newspaper.png') }}" alt="" height="25" width="25"
                                title="posts">
                        </div>

                        <p class="text-gray-400">{{$community->posts()->count()}}</p>
                    </div>
                    <div class="flex p-3">
                        <div class="px-3">
                            <form action="{{ route('community') }}" method="post">
                                @method('PUT')
                                @csrf

                                <input type="hidden" name="community_id" value="{{ $community->id }}">
                                @if(!empty(auth()->user()->community))
                                @if($community->id ===auth()->user()->community->id)
                                <button type="submit" class="rotate-45 transform" disabled>
                                    <img src="{{ asset('./images/add.png') }}" alt="" height="25" width="25"
                                        title="community joined">
                                </button>
                                @else
                                <button type="submit">
                                    <img src="{{ asset('./images/add.png') }}" alt="" height="25" width="25"
                                        title="join community">
                                </button>
                                @endif
                                @else
                                <button type="submit">
                                    <img src="{{ asset('./images/add.png') }}" alt="" height="25" width="25"
                                        title="join community">
                                </button>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="p-3 flex flex-col h-screen p-3">
            <div class="container">
                <p class="text-gray-400 text-center text-2xl font-light">There are no communities</p>
            </div>

        </div>
        @endif
        @endif
        {{-- posts --}}
        @if ($posts->count())
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach

        @else
        <div class="text-gray-400 text-lg container h-screen p-3">
            there are such no posts
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