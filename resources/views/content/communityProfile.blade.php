@extends('main.main')

@section('content')
<div class="lg:w-4/5 flex overflow-scroll">
    <div class="lg:p-3 lg:w-2/3">

        @if (!empty($community))

        @if(empty(auth()->user()->community))
        <div class="lg:rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="flex justify-between w-full">
                <div class="flex text-gray-400">
                    <p class="px-3 text-lg font-bold">You do not belong to any community</p>
                </div>
            </div>
        </div>
        @endif

        <div class="lg:rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="flex justify-between w-full">
                <div class="flex text-gray-400">
                    <p class="px-3 text-lg font-bold">Community Profile</p>
                </div>
            </div>
            <div class="flex lg:flex-row flex-col">
                <div class="flex p-3">
                    <img src="{{ asset('./images/image.png') }}" alt="" height="400" width="400">
                </div>
                <div class="flex flex-col container">

                    <div class="flex flex-col p-3 h-full">
                        <div class="">
                            <p class="text-gray-400 font-semibold text-xl">
                                {{ $community->community_name }}
                            </p>
                            <p class="text-gray-400">
                                {{ $community->community_description }}
                            </p>
                        </div>

                    </div>
                    <div class="flex">
                        <div class="flex p-3" title="users">
                            <div class="pr-3 lg:px-3">
                                <img src="{{ asset('./images/group.png') }}" alt="" height="30" width="30">
                            </div>

                            <p class="text-gray-400">{{ $community->users()->count() }}</p>
                        </div>
                        <div class="flex p-3" title="posts">
                            <div class="pr-3 lg:px-3">
                                <img src="{{ asset('./images/newspaper.png') }}" alt="" height="25" width="25">
                            </div>

                            <p class="text-gray-400">{{$community->posts()->count()}}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{-- community --}}
        @if ($community->posts->count())
        @foreach ($community->posts as $post)
        <x-post :post="$post" />
        @endforeach

        @else
        <div class="p-3 flex flex-col">
            <div class="container">
                <p class="text-gray-400 text-center text-2xl font-light">There are no post in this community</p>
            </div>

        </div>
        @endif
        {{-- end community --}}
        @else
        <div class="p-3 flex flex-col">
            <div class="container">
                <p class="text-gray-400 text-center text-2xl font-light">There is no such communities</p>
            </div>

        </div>
        @endif

        <div class="rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="container flex flex-col">
                <div class="text-gray-400 text-4xl">Start your own community</div>
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