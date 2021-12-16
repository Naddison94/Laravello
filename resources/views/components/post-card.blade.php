<div class="lg:mb-4 lg:px-4">
    <article class="overflow-hidden rounded-lg shadow-lg">
        <header class="flex items-center justify-between leading-tight p-2 md:p-4 bg-white">
            <h1 class="text-lg">
                <a class="no-underline hover:underline text-black" href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                @if(Auth::id() == $post->user_id)
                    | <a class="no-underline hover:underline text-green-500" href="{{ route('post.edit', ['id' => $post->id]) }}"><label class="text-green-500">edit</label></a>
                    | <a class="no-underline hover:underline text-red-500" href="{{ route('post.delete', ['id' => $post->id]) }}"><label class="text-red-500">delete</label></a>
                @endif
            </h1>
            <p class="text-grey-darker text-sm">
                {{ $post->created_at->diffForHumans() }}
            </p>
        </header>

        @if($post->img)
            <div class="flex justify-center max-h-lg max-w-md">
                <a href="#">
                    <img alt="img" class="" src="/user/{{ $post->author->id }}/post/{{ $post->id }}/{{ $post->img }}">
                </a>
            </div>
        @endif

        @if(Route::is('post.show') && $post->body)
            <div class="flex justify-center max-h-lg max-w-md p-2 m-2 bg-white rounded-lg shadow-lg" >
                    {{ $post->body }}
            </div>
        @endif

        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
            <a class="flex items-center no-underline hover:underline text-black" href="#">
                <img alt="avatar" class="block rounded-full sm:w-14 sm:h-14" src="{{  $post->author->avatar ? '/user/' . $post->author->id . '/avatar/' . $post->author->avatar : 'https://picsum.photos/32/32/?random' }}">
                <p class="ml-2 text-sm">
                    {{ $post->author->name }}
                </p>
            </a>
            @include('components.post-ratings')
        </footer>
    </article>
</div>
