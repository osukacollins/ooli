@extends('layouts.app')

@section('content')
<div class="h-screen flex align-center justify-center font-sans">
    <div class=" flex p-3 justify-center shadow-lg bg-gray-600 lg:w-3/5 self-center lg:m-20 rounded-xl"
        style="height:fit-content;">
        <div class="">
            <div class="text-gray-400 p-3 text-center font-light ">
                <p class="lg:text-6xl text-4xl">Welcome ! | Ooli</p>
            </div>
            <div class="flex flex-col text-gray-400 p-3 text-left font-bold w-full">
                @if(session()->has('status'))
                <div class="text-red-400 text-xl inline">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{ route('login') }}" method="post" class="flex flex-col w-full">
                    @csrf

                    <div class="m-3"><label for="email">EMAIL</label>
                        <br>
                        <input type="email" name="email"
                            class="shadow-inner w-full lg:w-2/3 rounded-xl border-2 bg-gray-500 border-gray-600 text-gray-200  text-base hover:border-blue-400 p-1  ">

                    </div>
                    <div class="m-3"><label for="username">PASSWORD</label>
                        <br>
                        <input type="password" name="password"
                            class="shadow-inner w-full lg:w-2/3 rounded-xl border-2 bg-gray-500 border-gray-600 text-gray-200  text-base hover:border-blue-400 p-1 ">
                    </div>
                    <div class="m-3">
                        <button
                            class="border-2 border-gray-400 hover:border-blue-400 hover:text-blue-400 px-10 py-1 rounded-2xl text-lg">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
            <div class="pb-3 lg:p-3">
                <a href="#" class="text-blue-400 m-3">Forgot your password?</a>
                <a href="{{ route('register') }}" class="text-blue-400 m-3">New? Register</a>
            </div>
        </div>

        <div class="m-3 self-center hidden lg:flex lg:flex-col">
            <p class="text-gray-400 text-xl m-3">Qr Code</p>
            <img src="{{ asset('./images/good.png') }}" alt="">
        </div>
    </div>
</div>
@endsection