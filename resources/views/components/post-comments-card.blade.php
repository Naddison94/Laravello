<div class="w-full bg-white p-2 pt-4 rounded shadow-lg">
    <form action="{{ route('comment.store', ['id' => $post->id]) }}" method="POST">
        @csrf
        <div class="flex ml-3">
            <div class="mr-3">
                <img src="{{ getUserAvatar(Auth::user()) }}" alt="" class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10">
            </div>

            <div>
                <h1 class="font-semibold">{{ Auth::user()->name }}</h1>
                <p class="text-xs text-gray-500">Leave a comment</p>
            </div>
        </div>

        <div class="mt-3 p-3 w-full">
            <textarea name="comment" rows="5" class="border p-2 rounded w-full" placeholder="Write something...">{{ old('comment') }}</textarea>
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
            @foreach($post->comments as $comment)
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ getUserAvatar($comment->author) }}" alt="">
                </div>
                <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <strong>{{$comment->author->name}}</strong>
                    @if(Auth::id() == $comment->user_id)
                        <a class="no-underline hover:underline text-red-500 float-right" href="{{ route('comment.delete', ['id' => $comment->id]) }}"><label class="text-red-500">delete</label></a>
                    @endif
                    <span class="text-xs text-gray-400">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                    <p class="text-sm">
                        {{ $comment->comment }}
                    </p>
                    <div x-data="{ open: false }">
                        <button x-on:click="open = ! open">
                            <div class="text-sm text-gray-500 font-semibold">
                                <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs w-full">{{ $comment->replies->count() }} Replies</h4>
                            </div>
                        </button>
                        <div x-show="open" class="text-sm p-4rounded shadow-lg pb-2 min-w-full">
                        @foreach($comment->replies as $reply)
                            <div class="space-y-4 pt-4">
                                <div class="flex px-2">
                                    <div class="flex-shrink-0 mr-3">
                                        <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="{{ getUserAvatar($reply->author) }}" alt="">
                                    </div>

                                    <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                        @if(Auth::id() == $reply->user_id)
                                            <a class="no-underline hover:underline text-red-500 float-right" href="{{ route('comment.delete', ['id' => $reply->id]) }}"><label class="text-red-500">delete</label></a>
                                        @endif
                                        <strong>{{ $reply->author->name }}</strong> <span class="text-xs text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                                        <p class="text-xs sm:text-sm">
                                            {{ $reply->comment }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
