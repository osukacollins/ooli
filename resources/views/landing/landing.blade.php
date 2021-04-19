@extends('layouts.app')

@section('content')
<div class="lg:bg-scroll h-screen flex" style="background-image: url({{ asset('./images/disco-ball.png') }}), url({{ asset('./images/Clouds.png') }});
  background-position: left top, right bottom;
  background-repeat: no-repeat, no-repeat;">
    <div class="flex  justify-center self-center">

        <div class="flex justify-center flex-col lg:p-10 lg:w-2/3 p-1">
            <div class="h-30"> </div>
            <div class="flex text-center justify-center text-gray-400 p-3">
                <p class="lg:text-6xl  font-bold lg:font-light text-2xl">Join the Ooli communities</p>
            </div>
            <div class="flex text-center justify-center text-gray-400 p-3">
                <p class="lg:text-xl">Join friends and communities at Ooli and experience ultimate fun.
                    Share moments, comment, hang out with friends from
                    around the world</p>
            </div>
            <div class="flex text-center justify-center text-gray-400 p-3">
                <a href="{{ route('login') }}"
                    class="border-2 border-gray-400 hover:border-blue-400 hover:text-blue-400 px-10 py-1 rounded-2xl text-lg">
                    Join up
                </a>
            </div>
        </div>
    </div>
</div>
{{-- The second section --}}
<div class="h-screen flex flex-col lg:p-10 justify-center p-2">
    <div class="flex text-gray-400 text-center justify-center p-3" id="about">
        <p class="lg:text-6xl font-bold text-xl mt-20 lg:m-0">About Ooli Communities
        </p>
    </div>
    <div class="flex text-center justify-center text-gray-400 p-3">
        <p class="text-lg text-light tracking-widest">What makes Ooli communities different?</p>
    </div>
    <div class="flex p-3 flex-col lg:flex-row">
        <div class="lg:p-5 flex lg:w-1/3">
            <div class="lg:p-3 flex align-center">
                <img src="{{ asset('./images/check.svg') }}" alt="" height="50" width="50">
            </div>
            <div class="p-3 text-gray-400">
                <p class="text-lg font-semibold">Organised Conversation</p>
                <p class="text-light">Topic-based text communities give you an organized way to talk about all the
                    things you love.</p>
            </div>
        </div>

        <div class="lg:p-5 flex lg:w-1/3">
            <div class="lg:p-3 flex align-center">
                <img src="{{ asset('./images/check.svg') }}" alt="" height="50" width="50">
            </div>
            <div class="p-3 text-gray-400">
                <p class="text-lg font-semibold">Vote and Karma</p>
                <p class="text-light">Upvote the posts you like and earn karma. Join communities of interest to increase
                    your upvote count.</p>
            </div>
        </div>
        <div class="lg:p-5 flex lg:w-1/3">
            <div class="lg:p-3 flex align-center">
                <img src="{{ asset('./images/check.svg') }}" alt="" height="50" width="50">
            </div>
            <div class="p-3 text-gray-400">
                <p class="text-lg font-semibold">Instant connectivity</p>
                <p class="text-light">Join communities and hang out with friends from all over the world. Get in touch
                    from across the globe.</p>
            </div>
        </div>
    </div>
    <div id="contact"></div>

</div>
<div class="flex p-3 lg:self-end justify-self-center justify-center">
    <div class=" text-center justify-center text-gray-400 p-3">
        <p class="font-light">Winners Hostel, Kahawa west, Nairobi, Kenya </p>
        <br>
        <div class="flex">
            <img src="{{ asset('./images/copyright.svg') }}" alt="" height="14" width="14">

            <p class="font-light px-3">Osuka Technologies</p>
        </div>



    </div>
</div>

@endsection