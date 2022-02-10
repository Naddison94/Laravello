<div class="w-full bg-white p-2 pt-4 rounded shadow-lg">
    <form action="{{ route('post.comment.store', ['id' => $post->id]) }}" method="POST">
        @csrf
        <div class="flex ml-3">
            <div class="mr-3">
                <img src="{{ getUserAvatar(Auth::user()) }}" alt="" class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10">
            </div>

            <div>
                <a href="{{ route ('user.profile.show', ['id' => $post->author->id]) }}">
                    <h1 class="font-semibold hover:underline">{{ Auth::user()->name }}</h1>
                </a>
                <p class="text-xs text-gray-500">Leave a comment</p>
            </div>
        </div>

        <div class="mt-3 p-3 w-full">
            <textarea name="comment" rows="5" class="border p-2 rounded w-full" placeholder="Leave a comment">{{ old('comment') }}</textarea>
        </div>

        <div class="flex justify-between mx-3">
            <div>
                <x-button>Submit</x-button>
            </div>
        </div>
    </form>

    <div class="p-4 antialiased mx-auto max-w-screen-sm">
        <h3 class="mb-4 text-lg font-semibold text-gray-900 ">{{ $post->comments->count() }} Comments</h3>
        <div class="space-y-4">
            @foreach($comments as $comment)
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ getUserAvatar($comment->author) }}" alt="">
                </div>
                <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <a href="{{ route ('user.profile.show', ['id' => $post->author->id]) }}">
                        <strong class="hover:underline">{{$comment->author->name}}</strong>
                    </a>


                    @if(Auth::id() == $comment->user_id)
                        <a class="no-underline hover:underline text-red-500 float-right" href="{{ route('post.comment.delete', ['id' => $comment->id]) }}">
{{--                            <label class="text-red-500">delete</label>--}}
                            <div class="h-6 w-6">
                                @include('components.icons.bin')
                            </div>
                        </a>
                    @endif
                    <span class="text-xs text-gray-400">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                    <div>
                        <p class="text-sm">
                            {{ $comment->comment }}
                        </p>
                    </div>
                    <div>
                        <div x-data="{ open: false }">
                            <button x-on:click="open = ! open">
                                <div class="text-sm text-gray-500 font-semibold">
                                    <h4 class="mt-4 uppercase tracking-wide text-gray-400 font-bold text-xs w-full">{{ $comment->replies->count() }} Replies</h4>
                                </div>
                            </button>
                            <div x-show="open" class="text-sm p-4 rounded shadow-lg pb-2 min-w-full">
                                @foreach($comment->replies as $reply)
                                    <div class="space-y-4 pt-4">
                                        <div class="flex px-2">
                                            <div class="flex-shrink-0 mr-3">
                                                <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="{{ getUserAvatar($reply->author) }}" alt="">
                                            </div>

                                            <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                                @if(Auth::id() == $reply->user_id)
                                                    <a class="no-underline hover:underline text-red-500 float-right" href="{{ route('post.comment.delete', ['id' => $reply->id]) }}">
{{--                                                        <label class="text-red-500">Delete</label>--}}
                                                        <div class="h-6 w-6">
                                                            @include('components.icons.bin')
                                                        </div>
                                                    </a>
                                                @endif
                                                <a href="{{ route ('user.profile.show', ['id' => $post->author->id]) }}">
                                                    <strong class="hover:underline">{{ $reply->author->name }}</strong> <span class="text-xs text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                                                </a>
                                                <p class="text-xs sm:text-sm">
                                                    {{ $reply->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                            <div x-data="{ open: false }">
                                <button x-on:click="open = ! open">
                                    <div class="text-sm text-gray-500 font-semibold">
                                        <h4 class="mt-4 uppercase tracking-wide text-gray-400 font-bold text-xs w-full">Reply</h4>
                                    </div>
                                </button>
                                <div x-show="open" class="text-sm min-w-full">
                                    <form action="{{ route('post.comment.reply', ['id' => $comment->id]) }}" method="POST">
                                        @csrf
                                        <textarea rows="5" class="border p-2 rounded w-full" name="reply" placeholder="Reply">@if($comment->id == session('comment_id')) {{ old('reply') }} @endif</textarea>
                                        <div class="flex justify-between mt-3">
                                            <x-button>Submit</x-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $comments->links() }}
        </div>
    </div>
</div>
