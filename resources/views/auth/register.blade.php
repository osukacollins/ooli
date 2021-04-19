@extends('layouts.app')

@section('content')
<div class="h-screen flex align-center justify-center font-sans">
    <div class=" flex p-3 container justify-center lg:shadow-lg lg:bg-gray-600 m-3 lg:w-2/5 rounded-xl lg:self-center"
        style="height: fit-content">
        <div class=" container">
            <div class="text-gray-400 p-3 text-center font-light ">
                <p class="text-3xl">Sign up for Ooli</p>
            </div>
            <div class="flex text-gray-400 p-3 text-left font-bold container h-4/5">
                <form action="{{ route('register') }}" method="post"
                    class="flex flex-col w-full items-center lg:items-stretch">
                    @csrf
                    <div class="w-full">
                        <label for="first_name" class="sr-only">FIRST NAME</label>
                        <br>
                        <input type="text" name="first_name" placeholder="First name" id="first_name"
                            class="shadow-inner w-full lg:w-2/3 rounded-lg border-2 bg-gray-500 border-gray-400 text-gray-200 text-base hover:border-blue-400 p-1"
                            @error('first_name') border-red-400 @enderror" value="{{ old('first_name') }}">

                        @error('first_name')
                        <div class="text-red-400 mt-2 text-sm">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="second_name" class="sr-only">SECOND NAME</label>
                        <br>
                        <input type="text" name="second_name" placeholder="Second name" id="second_name"
                            class="shadow-inner w-full lg:w-2/3 rounded-lg border-2 bg-gray-500 border-gray-400 text-gray-200 text-base hover:border-blue-400 p-1"
                            @error('second_name') border-red-400 @enderror" value="{{ old('second_name') }}">

                        @error('second_name')
                        <div class="text-red-400 mt-2 text-sm">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="email" class="sr-only">EMAIL</label>
                        <br>
                        <input type="email" name="email" placeholder="Email" id="email"
                            class="shadow-inner w-full lg:w-2/3 rounded-lg border-2 bg-gray-500 border-gray-400 text-gray-200 text-base hover:border-blue-400 p-1"
                            @error('email') border-red-400 @enderror" value="{{ old('email') }}">

                        @error('email')
                        <div class="text-red-400 mt-2 text-sm">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="password" class="sr-only">PASSWORD</label>
                        <br>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="shadow-inner w-full lg:w-2/3 rounded-lg border-2 bg-gray-500 border-gray-400 text-gray-200 text-base hover:border-blue-400 p-1"
                            @error('password') border-red-400 @enderror">

                        @error('password')
                        <div class="text-red-400 mt-2 text-sm">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="username" class="sr-only">CONFIRM PASSWORD</label>
                        <br>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm password"
                            class="shadow-inner w-full lg:w-2/3 rounded-lg border-2 bg-gray-500 border-gray-400 text-gray-200 text-base hover:border-blue-400 p-1"
                            @error('password_conformation') border-red-400 @enderror>

                    </div>
                    <div class=" py-3">
                        <button
                            class="border-2 border-gray-400 hover:border-blue-400 hover:text-blue-400 px-10 py-1 rounded-lg">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
            <div class="m-2">
                <a href="{{ route('login') }}" class="text-blue-400 m-3">Already have an account? Sign in</a>
            </div>
        </div>
    </div>
</div>
@endsection