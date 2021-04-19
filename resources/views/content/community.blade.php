@extends('main.main')

@section('content')
<div class="lg:w-4/5 flex overflow-scroll">
    <div class="lg:p-3 lg:w-2/3">
        <div class="text-gray-400 text-2xl font-bold lg:font-semibold p-1 lg:p-0 lg:text-4xl">Welcome to Ooli
            communities</div>

        @if ($communities->count())
        @if(empty(auth()->user()->community))
        <div class="rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="flex justify-between w-full">
                <div class="flex text-gray-400">
                    <p class="px-3 text-lg font-bold">You do not belong to any community</p>
                </div>
            </div>
        </div>
        @endif
        @foreach ($communities as $community)
        <div class="lg:rounded flex justify-between bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="flex p-3 items-center">
                <div class=""> <img src="{{ asset('./images/image.png') }}" alt="" height="20" width="20">
                </div>
                <a class="text-gray-400 px-3 font-semibold hover:text-blue-400"
                    href="{{ route('community.show', $community->id) }}">{{ $community->community_name }}</a>
            </div>
            <div class="w-1/2 flex justify-end">
                <div class="flex">
                    <div class="flex p-3">
                        <div class="lg:px-3 px-1">
                            <img src="{{ asset('./images/group.png') }}" alt="" height="30" width="30" title="Members">
                        </div>

                        <p class="text-gray-400">{{ $community->users()->count() }}</p>
                    </div>
                    <div class="flex p-3">
                        <div class="lg:px-3 px-1">
                            <img src="{{ asset('./images/newspaper.png') }}" alt="" height="25" width="25"
                                title="posts">
                        </div>

                        <p class="text-gray-400">{{$community->posts()->count()}}</p>
                    </div>
                    <div class="flex p-3">
                        <div class="lg:px-3 px-1">
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
        <div class="p-3 flex flex-col">
            <div class="container">
                <p class="text-gray-400 text-center text-2xl font-light">There are no communities</p>
            </div>

        </div>
        @endif
        <div class="lg:rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="container flex flex-col">
                <div class="text-gray-400 text-2xl font-bold lg:font-semibold p-1 lg:p-0 lg:text-4xl">Start your own
                    community</div>
                <form action="{{ route('community') }}" method="post" class="flex flex-col w-full text-gray-400">
                    @csrf

                    <div class="m-3"><label for="email">Community Name</label>
                        <br>
                        <input type="text" name="community_name"
                            class="shadow-inner w-full rounded-xl border-2 bg-gray-500 border-gray-600 text-gray-200  text-base hover:border-blue-400 p-1 ">

                    </div>
                    <div class="m-3"><label for="username">Description</label>
                        <br>
                        <textarea name="community_description" id="" cols="100" rows="3"
                            class="shadow-inner w-full rounded-xl border-2 bg-gray-500 border-gray-600 text-gray-200 text-base hover:border-blue-400 p-1 "></textarea>
                    </div>
                    <div class=" flex justify-between">
                        {{-- For more options --}}
                    </div>
                    <div class="m-3">
                        <button
                            class="border-2 border-gray-400 hover:border-blue-400 hover:text-blue-400 px-10 py-1 rounded-lg text-lg">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
    </div>
</div>
@endsection