<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ooli</title>
    <link rel="shortcut icon" href="{{ asset('./images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
</head>

<body>
    <div class="mx-auto bg-gray-800 h-screen">
        <nav class="lg:flex justify-between text-gray-400 text-base top-0 z-50 hidden ">
            <div>
                <a href="/home">
                    <img src="{{ asset('images/oolilogo.png') }}" alt="ooli" style="height: 65px">
                </a>
            </div>
            <div class="flex p-3 w-2/6">
                <form action="{{ route('search') }}" class="inline w-full" method="get">

                    <input type="text" name="search" id="" class="rounded-xl shadow-inner p-2 text-gray-400 w-4/5"
                        placeholder="Search for something">
                    <span>
                        <button class="border-gray-400 rounded-xl p-2 text-gray-400 border-2">Search</button>
                    </span>
                </form>
            </div>
            <div class="font-extralight font-sans">
                <ul class="flex justify-between flex-row ">
                    <li class="p-5"><img src="{{ asset('./images/user1.png') }}" alt="" height="30" width="30"></li>

                    <li class="p-5 flex">
                        <a href="{{ route('profile', auth()->user()->username) }}"
                            class="hover:text-blue-400">{{ auth()->user()->username }}</a>
                        @if (!empty(auth()->user()->community))
                        <span>
                            <a href="{{ route('community.show', auth()->user()->community->id) }}">
                                <strong
                                    class="font-bold">{{ '@' }}{{ auth()->user()->community->community_name }}</strong></a>
                        </span>

                        @else
                        <a class="text-red-400" href="{{ route('community') }}"> no community</a>
                        @endif

                    </li>

                    <li class="p-5"><a href="{{ route('logout') }}" class="text-blue-400"> logout</a></li>
                </ul>
            </div>

        </nav>
        <div class="flex flex-col-reverse lg:flex-row relative justify-between h-full">
            <div
                class="lg:h-screen lg:w-1/5 p-3 sticky flex w-full z-50 absolute -inset-0 lg:flex-col bg-gray-800 justify-between lg:justify-start shadow-sm lg:shadow-none lg:bg-transparent">
                <div class="flex px-4 lg:p-3">
                    <a href="{{ asset('home') }}" class="flex">
                        <img src="{{ asset('./images/home.png') }}" alt="home" height="50" width="50">
                        <div class=" p-3 hidden lg:flex">
                            <p class="text-gray-400 text-xl font-semibold hover:text-blue-400">Home</p>
                        </div>
                    </a>
                </div>
                <div class="flex px-4 lg:p-3">
                    <a href="{{ route('explore')}}" class="flex">
                        <img src="{{ asset('./images/loupe.png') }}" alt="seardh" height="50" width="50">
                        <div class=" p-3 hidden lg:flex">
                            <p class="text-gray-400 text-xl font-semibold hover:text-blue-400">Explore</p>
                        </div>
                    </a>

                </div>
                <div class="flex px-4 lg:p-3">
                    <a href="{{ route('notifications', auth()->user()->username) }}" class="flex">
                        <img src="{{ asset('./images/bell-ring.png') }}" alt="bell" height="50" width="50">
                        <div class=" p-3 hidden lg:flex">
                            <p class="text-gray-400 text-xl font-semibold hover:text-blue-400">Notifications</p>
                        </div>
                    </a>
                </div>
                <div class="flex px-4 lg:p-3">
                    <a href="{{ route('profile', auth()->user()->username) }}" class="flex">
                        <img src="{{ asset('./images/user.png') }}" alt="user" height="50" width="50">
                        <div class=" p-3 hidden lg:flex">
                            <p class="text-gray-400 text-xl font-semibold hover:text-blue-400">Profile</p>
                        </div>
                    </a>

                </div>
                <div class="flex px-4 lg:p-3">
                    <a href="{{ route('community') }}" class="flex">
                        <img src="{{ asset('./images/group.png') }}" alt="home" height="50" width="50">
                        <div class=" p-3 hidden lg:flex">
                            <p class="text-gray-400 text-xl font-semibold hover:text-blue-400">Communities</p>
                        </div>
                    </a>
                </div>
                <div class="flex px-4 lg:p-3">
                    <a href="{{ route('settings', auth()->user()->username) }}" class="flex">
                        <img src="{{ asset('./images/setting.png') }}" alt="home" height="50" width="50">
                        <div class=" p-3 hidden lg:flex">
                            <p class="text-gray-400 text-xl font-semibold hover:text-blue-400">Settings</p>
                        </div>
                    </a>

                </div>
            </div>
            @yield('content')
        </div>

    </div>
    <div class="hidden lg:flex p-3 self-end justify-self-center justify-center bg-gray-800">
        <div class=" text-center justify-center text-gray-400 p-3">
            <p class="font-light">Winners Hostel, Kahawa west, Nairobi, Kenya </p>
            <br>
            <div class="flex">
                <img src="{{ asset('./images/copyright.svg') }}" alt="" height="14" width="14">

                <p class="font-light px-3">Osuka Technologies</p>
            </div>



        </div>
    </div>
</body>

</html>