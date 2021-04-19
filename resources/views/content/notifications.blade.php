@extends('main.main')

@section('content')
<div class="lg:w-4/5 lg:flex">
    <div class="lg:p-3 lg:w-2/3">
        <div class="lg:rounded flex flex-col lg:bg-gray-600 p-3 lg:shadow-lg my-5">
            <div class="flex w-full">
                <div class="flex text-gray-400">
                    <p class="text-xl font-extra-light">Notifications</p>
                </div>
            </div>
            <hr style="border-block-color: #92a3a8;">
            <div class="flex p-3 flex-col ">
                @if (!empty(count($notifications)))
                @foreach ($notifications as $notification)
                <a href="{{ route('post.comments', $notification->user_id) }}">
                    <div class="flex p-3">
                        <img src="{{ asset('./images/image.png') }}" alt="" height="20" width="20">
                        <a class="text-gray-400 px-2 font-semibold hover:text-blue-400"
                            href="{{ route('profile', $notification->user->username) }}">
                            @if($notification->user->id == auth()->user()->id)
                            You
                            @else
                            {{ $notification->user->username }}
                            @endif
                        </a>

                        <p class="text-gray-400">
                            @if ($notification->type == 'upvote')
                            upvoted your
                            @elseif($notification->type == 'downvote')
                            downvoted your
                            @elseif($notification->type == 'comment')
                            commented on your
                            @elseif($notification->type == 'post')
                            created a new
                            @endif
                        </p>
                        <a href="{{ route('post.comments', $notification->post_id) }}" class="text-blue-400 pl-2">
                            post
                        </a>
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
    <div class="p-3 lg:w-1/3 hidden lg:flex lg:flex-col">
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