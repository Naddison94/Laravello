<div>
    <div class="p-4 antialiased mx-auto max-w-screen-sm">
        <div class="space-y-4">
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ getUserAvatar($comment->author) }}" alt="">
                </div>
                <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <a href="{{ route ('user.profile.show', ['id' => $comment->author->id]) }}">
                        <strong class="hover:underline">{{$comment->author->name}}</strong>
                    </a>
                    @if(Auth::id() == $comment->user_id)
                        <a class="no-underline hover:underline text-red-500 float-right" href="{{ route('post.comment.delete', ['id' => $comment->id]) }}">
                            <label class="text-red-500">delete</label>
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
                </div>
            </div>
        </div>
    </div>
</div>
