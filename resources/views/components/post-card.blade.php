<div class="lg:mb-4 lg:px-4">
    <article class="overflow-hidden rounded-lg shadow-lg">
        <header class="flex items-center justify-between leading-tight p-2 md:p-4 bg-white">
            <h1 class="text-lg">
                <a class="no-underline hover:underline text-black" href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                <p class="text-sm text-gray-400">{{ $post->category->title }}</p>
            </h1>

            <div>
                @if(Auth::id() == $post->user_id)
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    @include('components.icons.triple-dots')
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <a class="block p-4 text-center text-gray-700 hover:bg-green-500 hover:text-white" href="{{ route('post.edit', ['id' => $post->id]) }}">edit</a>
                                <a class="block p-4 text-center text-gray-700 hover:bg-red-500 hover:text-white" href="{{ route('post.delete', ['id' => $post->id]) }}">delete</a>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
                <p class="text-grey-darker text-sm">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
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
            <a class="flex items-center no-underline hover:underline text-black" href="{{ route ('user.profile.show', ['id' => $post->author->id]) }}">
                <img alt="avatar" class="block rounded-full sm:w-14 sm:h-14" src="{{  $post->author->avatar ? '/user/' . $post->author->id . '/avatar/' . $post->author->avatar : 'https://picsum.photos/32/32/?random' }}">
                <p class="ml-2 text-sm">
                    {{ $post->author->name }}
                </p>
            </a>
            @include('components.post-ratings')
        </footer>
    </article>
</div>
