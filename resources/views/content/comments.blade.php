@extends('main.main')

@section('content')
<div class="lg:w-4/5 flex overflow-scroll">
    <div class="lg:p-3 lg:w-2/3">
        <div class="lg:rounded flex flex-col bg-gray-700 p-3 flex shadow-lg lg:my-5">
            <div class="flex justify-between w-full">
                <div class="flex text-gray-400">

                    <img src="{{ asset('./images/user1.png') }}" alt="" height="30" width="30">
                    <a href="{{ route('profile', $post->user->username) }}" class="px-3">{{ $post->user->username }}
                        {{'@'}}{{ $post->community->community_name }}</a>
                </div>
                <div class="flex text-gray-400">
                    <p class="text-sm font-extra-light">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex p-3">
                <p class="text-gray-400">
                    {{ $post->body }}
                </p>

            </div>
            <div class="flex container justify-between">
                <div class="flex ">
                    <div class="flex p-3">
                        <div class="px-3">
                            @if($post->upvotedBy(auth()->user()))
                            <form action="{{ route('upvote.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src="{{ asset('./images/chevron.png') }}" alt="" height="20" width="20"
                                        title="upvoted">
                                </button>

                            </form>
                            @else
                            <form action="{{ route('upvote', $post->id) }}" method="post">
                                @csrf
                                <button type="submit">
                                    <img src="{{ asset('./images/chevron.png') }}" alt="" height="20" width="20">
                                </button>

                            </form>
                            @endif
                        </div>

                        <p class="text-gray-400 @if($post->upvotedBy(auth()->user())) text-blue-400 font-bold @endif">
                            {{ $post->upvotes->count() }}</p>
                    </div>
                    <div class="flex p-3">
                        <div class="px-3">
                            @if($post->downvotedBy(auth()->user()))
                            <form action="{{ route('downvote.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src="{{ asset('./images/chevron.png') }}" alt="" height="20" width="20"
                                        title="downvoted">
                                </button>

                            </form>
                            @else
                            <form action="{{ route('downvote', $post->id) }}" method="post">
                                @csrf
                                <button type="submit">
                                    <img src="{{ asset('./images/chevron.png') }}" alt="" height="20" width="20">
                                </button>

                            </form>
                            @endif
                        </div>

                        <p class="text-gray-400 @if($post->downvotedBy(auth()->user())) text-blue-400 font-bold @endif">
                            {{ $post->downvotes->count() }}</p>
                    </div>
                </div>

                @if($post->user_id == auth()->user()->id)
                <div class="p-3">
                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete post">
                            <img src="{{ asset('./images/delete.png') }}" alt="" height="20" width="20">
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <div class="flex container justify-between">
                <div class="p-3 hidden lg:block">
                    <img src="{{ asset('./images/user1.png') }}" alt="" height="40" width="40">
                </div>
                <form action="{{ route('post.comments', $post->id) }}" class="p-3 flex" method="post">
                    @csrf
                    <textarea name="body" id="" cols="100" rows="1"
                        placeholder="Comment as {{ auth()->user()->username }}"
                        class="w-full rounded-xl p-3 shadow-inner mx-3" required></textarea>
                    <button class="border-2 border-blue-400 text-blue-400 rounded-xl p-2" type="submit">
                        Post
                    </button>

                </form>
            </div>

            <div class=" flex flex-col lg:pl-8 flex  lg:my-5">
                @if ($comments->count())
                @foreach ($comments as $comment)
                <div class="flex flex-col border-l-2 border-blue-400 m-3 bg-gray-600 text-gray-400">
                    <div class="flex justify-between w-full p-3">
                        <div class="flex text-gray-400">
                            <div class=""> <img src="{{ asset('./images/user1.png') }}" alt="" height="30" width="30">
                            </div>
                            <a href="{{ route('profile', $comment->user->username) }}"
                                class="px-3">{{ $comment->user->username }}
                                {{'@'}}{{ $comment->user->community->community_name }}
                            </a>
                        </div>
                        <div class="flex text-gray-400">
                            <p class="text-sm font-extra-light">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex p-3">
                        <p class="text-gray-400">
                            {{ $comment->body }}
                        </p>

                    </div>
                    @if($comment->user->id == auth()->user()->id)
                    <div class="p-3 self-end">
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete post">
                                <img src="{{ asset('./images/delete.png') }}" alt="" height="20" width="20">
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                @endforeach

                @else
                <p class="text-gray-400 text-lg font-italics">There are no comments yet</p>
                @endif

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