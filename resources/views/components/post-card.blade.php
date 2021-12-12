<div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
    <article class="overflow-hidden rounded-lg shadow-lg">
        <a href="#">
            <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random">
        </a>

        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
            <h1 class="text-lg">
                <a class="no-underline hover:underline text-black" href="#">
                    {{ $post->title }}
                </a>
            </h1>
            <p class="text-grey-darker text-sm">
                {{ $post->created_at->diffForHumans() }}
            </p>
        </header>

        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
            <a class="flex items-center no-underline hover:underline text-black" href="#">
                <img alt="avatar" class="block rounded-full xl:max-w-12 xl:max-h-12" src="{{  $post->author->avatar ? '/user/' . $post->author->id . '/avatar/' . $post->author->avatar : 'https://picsum.photos/32/32/?random' }}">
                <p class="ml-2 text-sm">
                    {{ $post->author->name }}
                </p>
            </a>
            <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                <span class="text-2xl">+</span>
                <hr>
                <span class="text-2xl">-</span>
            </a>
        </footer>
    </article>
</div>
