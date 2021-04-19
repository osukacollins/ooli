@props(['post'=> $post])

<div class="lg:rounded flex flex-col bg-gray-600 p-3 flex shadow-lg my-5">
    <div class="flex justify-between w-full">
        <div class="flex text-gray-400">
            <div class=""> <img src="{{ asset('./images/user1.png') }}" alt="" height="30" width="30">
            </div>
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
    <div class="flex justify-between">
        <div class="flex">
            <div class="flex p-3">
                <div class="px-3">
                    <a href="{{ route('post.comments', $post->id) }}">
                        <img src="{{ asset('./images/chat-1.png') }}" alt="" height="20" width="20">
                    </a>

                </div>

                <p class="text-gray-400">{{ $post->comments->count() }}</p>
            </div>
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
            <div class="flex p-3 ">
                <div class="px-3">
                    @if($post->downvotedBy(auth()->user()))
                    <form action="{{ route('downvote.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img src="{{ asset('./images/chevron-1.png') }}" alt="" height="20" width="20"
                                title="downvoted">
                        </button>

                    </form>
                    @else
                    <form action="{{ route('downvote', $post->id) }}" method="post">
                        @csrf
                        <button type="submit">
                            <img src="{{ asset('./images/chevron-1.png') }}" alt="" height="20" width="20">
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
</div>