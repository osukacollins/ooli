@extends('main.main')

@section('content')
<div class="w-4/5 flex">
    <div class="p-3 w-2/3">
        <div class="rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
            <div class="flex w-full">
                <div class="flex text-gray-400">
                    <p class="text-xl font-extra-light">Notifications</p>
                </div>
            </div>
            <hr style="border-block-color: #92a3a8;">
            <div class="flex p-3 flex-col">
                @if (!empty(count($notifications)))
                @foreach ($notifications as $notification)
                <a href="{{ route('post.comments', $notification->post_id) }}">
                    <div class="flex p-3">
                        <img src="{{ asset('./images/image.png') }}" alt="" height="20" width="20">
                        <a class="text-gray-400 px-3 font-semibold hover:text-blue-400"
                            href="{{ route('profile', $notification->user->username) }}">
                            {{ $notification->user->username }}
                        </a>

                        <p class="text-gray-400">
                            @if ($notification->type == 'upvote')
                            upvoted your post
                            @elseif($notification->type == 'downvote')
                            downvoted your post
                            @elseif($notification->type == 'comment')
                            commented on your post
                            @elseif($notification->type == 'post')
                            created a new post
                            @endif
                        </p>
                    </div>
                </a>
                @endforeach


                @else
                <p class="text-gray-400">
                    There are no new notifications
                </p>
                @endif


            </div>
        </div>
    </div>
    <div class="p-3 w-1/3 flex flex-col">
        <div class="text-gray-400 p-3">
            <p class="text-3xl">Filter notifications</p>
            <div class="font-light p-3">
                <ul>
                    <li class="px-3">Unseen only</li>
                    <li class="px-3">Upvotes only</li>
                    <li class="px-3">Downvotes only</li>
                    <li class="px-3">Comments</li>
                    <li class="px-3">Posts</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection