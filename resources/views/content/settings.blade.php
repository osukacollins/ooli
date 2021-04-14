@extends('main.main')

@section('content')
<div class="w-4/5 flex">
    <div class="p-3 w-2/3">
        <div class="rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="bottom-3" id="account">
                <div class="flex w-full">
                    <div class="flex text-gray-400">
                        <p class="text-xl font-extra-light">Your account</p>
                    </div>
                </div>
                <hr style="border-block-color: #92a3a8;">
                <div class="flex p-3">
                    <a href="{{ route('profile', auth()->user()->username) }}" class="text-gray-400 hover:text-blue-400">
                        Go to profile settings
                    </a>
                </div>
            </div>

            <div class="bottom-3" id="security">
                <div class="flex w-full">
                    <div class="flex text-gray-400">
                        <p class="text-xl font-extra-light">Security</p>
                    </div>
                </div>
                <hr style="border-block-color: #92a3a8;">
                <div class="flex flex-col p-3">
                    <a href="#" class="text-gray-400 hover:text-blue-400">
                        Change password
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400">
                        Verify account
                    </a>
                </div>
            </div>

            <div class="bottom-3" id="privacy">
                <div class="flex w-full">
                    <div class="flex text-gray-400">
                        <p class="text-xl font-extra-light">Privacy</p>
                    </div>
                </div>
                <hr style="border-block-color: #92a3a8;">
                <div class="flex flex-col p-3">
                    <div class="p3 text-gray-400">
                        <form action="{{ route('settings', auth()->user()->id) }}" class="flex flex-col" method="post">
                            @csrf
                            <div class="flex justify-between py-1">
                                <label for="see_me">Who can see me?</label>
                                <span class="text-gray-800">
                                    <select name="see_me" id="see_me" class="rounded">
                                        <option value="global">Everyone</option>
                                        <option value="my community">My community</option>
                                        <option value="only me">Only me</option>
                                    </select>
                                </span>
                            </div>

                            <div class="flex justify-between py-1">
                                <label for="see_post">Who can see my posts?</label>
                                <span class="text-gray-800">
                                    <select name="see_post" id="see_post" class="rounded">
                                        <option value="everyone">Everyone</option>
                                        <option value="my community">My community</option>
                                        <option value="only me">Only me</option>
                                    </select>
                                </span>
                            </div>

                            <div class="flex justify-between py-1">
                                <label for="list_post">Which posts can I see only?</label>
                                <span class="text-gray-800">
                                    <select name="list_post" id="list_post" class="rounded">
                                        <option value="my community">My community</option>
                                        <option value="global">Global</option>
                                        <option value="my posts">My posts</option>
                                    </select>
                                </span>
                            </div>

                    </div>
                </div>
            </div>

            <div class="bottom-3" id="notifications">
                <div class="flex w-full">
                    <div class="flex text-gray-400">
                        <p class="text-xl font-extra-light">Notifications</p>
                    </div>
                </div>
                <hr style="border-block-color: #92a3a8;">
                <div class="flex flex-col p-3">
                    <div class="p3 text-gray-400">
                        <div class="flex justify-between py-1">
                            <label for="sound_on">Enable sound notification</label>
                            <span class="text-gray-800">
                                <input type="checkbox" name="sound_on" id="sound-on"
                                    class="border-2 border-gray-800 rounded-sm bg-gray-400" value="1">
                            </span>
                        </div>

                        <div class="flex justify-between py-1">
                            <label for="upvote_on">Upvotes</label>
                            <span class="text-gray-800">
                                <input type="checkbox" name="upvote_on" id="upvote-on"
                                    class="border-2 border-gray-800 rounded-sm bg-gray-400" value="1" checked>
                            </span>
                        </div>

                        <div class="flex justify-between py-1">
                            <label for="downvote_on">Downvotes</label>
                            <span class="text-gray-800">
                                <input type="checkbox" name="downvote_on" id="downvote-on"
                                    class="border-2 border-gray-800 rounded-sm bg-gray-400" value="1" checked>
                            </span>
                        </div>

                        <div class="flex justify-between py-1">
                            <label for="comments_on">Comments</label>
                            <span class="text-gray-800">
                                <input type="checkbox" name="comments_on" id="comments-on"
                                    class="border-2 border-gray-800 rounded-sm bg-gray-400" value="1" checked>
                            </span>
                        </div>

                        <div class="flex justify-between py-1">
                            <label for="posts_on">Posts</label>
                            <span class="text-gray-800">
                                <input type="checkbox" name="posts_on" id="posts-on"
                                    class="border-2 border-gray-800 rounded-sm bg-gray-400" value="1">
                            </span>
                        </div>
                        <div class="">
                            <button class="border-2 border-blue-400 text-blue-400 p-1 rounded">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bottom-3" id="delete-account">
                <hr style="border-block-color: #92a3a8;">
                <div class="flex p-3">
                    <a href="#" class="text-gray-400 hover:text-blue-400">
                        Delete my Account
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="p-3 w-1/3 flex flex-col">
        <div class="rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5 w-2/3">
            <div class="text-gray-400">
                <div class="font-semibold text-lg">
                    <ul>
                        <li class=""><a href="#account"> Account</a></li>
                        <li class=""><a href="#security">Security</a></li>
                        <li class=""><a href="#privacy">Privacy</a></li>
                        <li class=""><a href="#notifications">Notifications</a></li>
                        <li class=""><a href="#delete-account">Delete account</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection