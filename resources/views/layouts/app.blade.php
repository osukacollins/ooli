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

<body class="m-0 w-full">
    <div class="mx-auto bg-gray-800">
        <nav class="flex justify-between text-gray-400 text-base sticky bg-gray-800 lg:bg-transparent top-0 z-50">
            <div class="h-max">
                <a href="/">
                    <img src="{{ asset('images/oolilogo.png') }}" alt="ooli" style="height: 56px">
                </a>
            </div>
            <div class="font-extralight font-sans text-sm lg:text-base">
                <ul class="flex lg:justify-between lg:flex-row">
                    <li class="lg:p-5 px-3 py-5"><a href="/#about">About</a></li>
                    <li class="lg:p-5 px-3 py-5">| </li>
                    <li class="lg:p-5 px-3 py-5"><a href="{{ route('register') }}">Join</a></li>
                    <li class="lg:p-5 px-3 py-5">| </li>
                    <li class="lg:p-5 px-3 py-5"><a href="/#contact">Contact</a></li>
                </ul>
            </div>

        </nav>
        @yield('content')
    </div>
</body>

</html>